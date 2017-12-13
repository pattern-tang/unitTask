<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/26
 * Time: 13:56
 */
namespace School\Common;
class BaseController extends \Think\Controller{
    protected $module;
    public function __construct(){
        parent::__construct();
        //判断登录
        header("Content-Type:text/html;charset=utf-8");
        if(!session('?uId')){
            //判断是否是记住密码的用户
            $sid = cookie('sid');
            if(isset($sid)){
                session_destroy();//销毁session
                session_id($sid);//重新定义sessionid
                session_start();//重新启动session
                if(!session('?uId')){
                    //跳转
                    redirect(U('School/Login/showLogin'),2);
                }
            }
            else{
                //跳转
                redirect(U('School/Login/showLogin'),2);
            }
        }
        //如果已经登录  把用户的信息传递给静态页面
        $user_info['uId']=session('uId');
        $user_info['uName']=session('uName');
        $this->assign('user_info',$user_info);
        $this->module=M('menu')->where('module=\'School\'')->select();
        $this->assign('menu_list',$this->module);
    }
    //菜单列表
    protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
        parent::display('./Public/_meta');
        parent::display($templateFile,$charset,$contentType,$content,$prefix);
        parent::display('index-end');
    }
}