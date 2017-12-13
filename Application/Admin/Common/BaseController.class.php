<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 10:20
 */
namespace Admin\Common;
use Think\Controller;
class BaseController extends Controller{
    protected $save=array();//跳转提示
    public $controller="../Index";
    public $title=[
        'big'=>'系统管理',
        'middle'=>'用户管理',
        'min'=>'用户列表'
    ];
    protected $access;
    public function __construct()
    {
        parent::__construct();
        header("Content-Type:text/html;charset='utf-8'");
        if(!session('?uid')){
            //判断是否是记住密码的用户
            $sid = cookie('session_id');
            if(isset($sid)){
                session_destroy();//销毁session
                session_id($sid);//重新定义sessionid
                session_start();//重新启动session
                if(!session('?uid')){
                    //跳转
                    redirect(U('Admin/Login/index'),'1', '没有登录，页面跳转中...');
                }
            }
            else{
                //跳转
                redirect(U('Admin/Login/index'),'1', '没有登录，页面跳转中...');
            }

        }
        //如果已经登录  把用户的信息传递给静态页面
        $user_info['uid']=session('uid');
        $user_info['uname']=session('uname');
        $user_info['uphoto']=session('uphoto');
        $this->assign('user_info',$user_info);
//获取当前用户的菜单  如果是超级管理员  就是全部权限  如果不是超级管理员就是权限表的权限
        $access=M('access');
        $this->access = $access->alias('a')
            ->field("a.*,m.name,m.module,m.controller,m.method")
            ->join("LEFT JOIN menu m ON a.menu_id=m.id")
            ->where("user_id=".$user_info['uid']." AND status=1")
            ->select();

        $this->assign('menu_list',$this->access);



    }
    //权限验证请求ajax
    public function checkAccess(){
        //得到需要的action  得到需要的操作【增、删、改、查】 都是从url里面得到
        $index=strrpos(__CONTROLLER__,'/')+1;
        //dump($index);
        $controller=substr(__CONTROLLER__,$index,strlen(__CONTROLLER__));
        $method=I('post.method');
        $data=['access'=>0];
        foreach($this->access as $vo){
            if($vo['controller']=$controller){
                $data['access']=$vo[$method];
            }
        }
        if(session('uid')==1){$data['access']=1;}
        $this->ajaxReturn($data);
    }
    /**
     * 模板显示 调用内置的模板引擎显示方法，
     * @access protected
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @param string $charset 输出编码
     * @param string $contentType 输出类型
     * @param string $content 输出内容
     * @param string $prefix 模板缓存前缀
     * @return void
     */
    protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
        parent::display("./Menu");
        parent::display($templateFile,$charset,$contentType,$content,$prefix);
    }
    //跳转方法
    protected function jump(){
        $success= redirect($this->controller.'/userList',1,$this->save['success']);
        $error=redirect($this->controller.'/userList',2,$this->save['error']);
        return array('success'=>$success,'error'=>$error);//
    }
}