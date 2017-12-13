<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 12:51
 */

namespace Admin\Common;
use Think\Controller;

class TestController extends Controller{
    public $title=[
        'big'=>'系统管理',
        'middle'=>'用户管理',
        'min'=>'用户列表'
    ];
    public function __construct(){
        parent::__construct();
        //判断登录
        header("Content-Type:text/html;charset=utf-8");
        if(!session('?uid')){
            //判断是否是记住密码的用户
            $sid = cookie('sid');
            if(isset($sid)){
                session_destroy();//销毁session
                echo session_id($sid);//重新定义sessionid
                session_start();//重新启动session
                if(!session('?uid')){
                    //跳转
                    $this->redirect('Admin/Login/index','',1, '欢迎登录...');
                }
            }
            else{
                //跳转
                $this->redirect('Admin/Login/index','',1, '请登录...');
            }
        }
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
        parent::display('./Menu');
        parent::display($templateFile,$charset,$contentType,$content,$prefix);
    }
}