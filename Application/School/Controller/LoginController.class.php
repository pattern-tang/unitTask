<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/27
 * Time: 16:21
 */
namespace School\Controller;
use Think\Controller;

class LoginController extends Controller{
    protected $model;
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)){
            session_start();
        }
        $this->model=D('User');
        header("Content-Type:text/html;charset=utf-8");
    }
    //验证登录页
    public function checkUser(){
        if(IS_POST){
            //echo '<pre>';print_r($_POST);exit;
            $account  = I('post.account','','trim,addslashes');
            $password = md5(I('post.password','','trim'));
            $remember=I('post.online','0');
            //table命名
            $table = 'seed_user';
            $table1 = 'seed_student_info';
            $table2 = 'seed_teacher';
            $table3 = 'seed_parents';
            //if($account!='' and $password!=''){
                $data1=$this->model->checkRow($table,$account,$password);
                $data2=$this->model->checkRow($table1,$account,$password);
                $data3=$this->model->checkRow($table2,$account,$password);
                $data4=$this->model->checkRow($table3,$account,$password);
                if(!empty($data1)||!empty($data2)||!empty($data3)||!empty($data4)){
                    $data=array();
                    $member=array($data1,$data2,$data3,$data4);
                    for ($i=0;$i<count($member);$i++){
                        if (!empty($member[$i])){
                            if ($i==0){
                                session('utable',$table);
                            }elseif ($i==1){
                                session('utable',$table1);
                            }elseif ($i==2){
                                session('utable',$table2);
                            }elseif ($i==3){
                                session('utable',$table3);
                            }
                            $data=$member[$i];
                        }
                        break;
                    }
                    $ses=session_id();
                    //dump($data);exit(0);
                    session('uId',$data['id']);
                    session('uName',$data['name']);
                    session('uPhone',$data['phone']);
                    if($remember>0){
                        setcookie('sid',$ses,time()+24*3600,'/');
                    }
                    else{
                        setcookie('sid',$ses,null,'/');
                    }
                    $this->ajaxReturn(true);
                }
                //redirect(U('School/Index/showIndex'), 1, '登录成功，页面跳转中...');
            else{
                $this->ajaxReturn(false);
            }
        }else{
            //$this->error('内容为空',U("School/Login/showLogin"),2);
            $this->ajaxReturn(false);
        }
    }
    //显示登录页
    public function showLogin(){
        $this->display('/Index/login');
    }
    //添加头像
    public function avatarAdd(){
        $id=I('get.id');
        $this->assign('id',$id);
        $this->display('/Add/photo-add');
    }
    public function cancel(){
        session_destroy();
        redirect(U('School/Login/showLogin'),1, '页面跳转中...');
    }
    public function welcome(){
        $this->display('/Index/welcome');
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
}