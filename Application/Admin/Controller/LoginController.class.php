<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 13:57
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    protected $model;
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)){
            session_start();
        }
        $this->model=D("User");
        header("Content-Type:text/html;charset=utf-8");
    }
    //显示登录页
    public function index(){

        $this->display('./login');
    }
    //验证登录页
    public function checkUser(){
        if(IS_POST){

            $account  = I('post.account','','addslashes');
            $password = md5(I('post.password','','trim'));
            $remember=I('post.remember','0');
            $data=$this->model->findRow($account,$password);
            if($account!='' and $password!='' and is_array($data)){
                $ses=session_id();
                //dump($data);exit(0);
                if($remember>0){
                    setcookie('sid',$ses,time()+24*3600,'/');
                }
                else{
                    setcookie('sid',$ses,null,'/');
                }
                $_SESSION['uid']=$data['id'];
                $_SESSION['uname']=$data['name'];
                $this->redirect('Admin/Index/userList', '', 1, '登录成功，页面跳转中...');
            }else{
                $this->error('登录失败，即将跳转',U("Admin/Login/index"),2);
            }
        }else{
            $this->error('内容为空',U("Admin/Login/index"),2);
        }
    }
    //显示新增页面
    public function showAdd(){
        $this->title['min']='新增用户';
        //赋值标题
        $this->assign('title',$this->title);
        //查询部门、角色
        $data=$this->model->selectShow();
        $this->assign('role',$data['role']);
        $this->assign('branch',$data['branch']);
        //$this->display('./Menu');
        $this->display('./add');
    }
    //验证内容是否重复
    public function checkName($data=array(),$id=0){
        $param=$data;
        if(empty($data)&&IS_POST){
            $param = $_POST;
        }
        $key = array_keys($param)[0];
        $val = $param[$key];
        $response = ['status'=>false,'message'=>'该内容已经存在，限制使用。'];
        $number=$this->model->checkNumber($key,$val,$id);
        //dump($param);echo ;exit;
        if(empty($data)){
            $name = I('post.name','','addslashes');
            $response['name']=$name;//调用模型方法返回查询电话和用户名个数
            $str=$this->model->checkName($name);
            if($str>0 ){
                if(is_numeric($name)){
                    $response['message']='电话号码已经存在';
                }else{
                    $response['message']='用户名已经存在';
                }
                $this->ajaxReturn($response);
            }else{
                $response['status']=true;
                if(is_numeric($name)){
                    $response['message']='电话号码可用';
                }else{
                    $response['message']='用户名可用';
                }
                $this->ajaxReturn($response);   //调用模型方法返回修改是否重复
            }
        }
        else{
            if($number>0 ){
                return $response;
            }
            else{
                $response = ['status'=>true,'message'=>'该内容可以使用'];
                return $response;
            }
        }
    }
//注册保存
    public function userSave(){
        if(IS_POST) {
            $_POST['name'] = I('post.name', '', 'trim');
            $_POST['account'] = I('post.account', '', 'addslashes');
            $_POST['phone'] = I('post.phone', '', 'trim');
            $_POST['password'] = I('post.password', '', 'MD5');
            unset($_POST['repass']);
            if($this->model->addUser($_POST)){
               $this->success('注册成功','./index');
            }else{
               $this->error('注册失败','./index');
            }
        }
    }

}