<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 13:48
 */
namespace Admin\Controller;

use Admin\Common\BaseController;

class UserController extends BaseController {
    protected $model;//user模型
    //用户列表
    public function __construct()
    {
        parent::__construct();
        $this->model=D("User");
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
        $this->display('add');
    }


    //显示用户修改头像页面
    public function showPhoto(){
        //确定用户id
        $id = I("get.id");
        $this->title['min']='修改头像';
        //赋值标题
        $this->assign('title',$this->title);
        //把用户id赋予静态页面
        $this->assign('id',$id);
        $this->display('photo');
    }

    //保存用户
    public function userSave(){
        if(IS_POST){
            $_POST['name']=I('post.name','','trim');
            $_POST['account']=I('post.account','','addslashes');
            $_POST['phone']=I('post.phone','','trim');
            $id=I('post.id');
            $_POST['password']=I('post.password','','MD5');
            unset($_POST['repass']);
            unset($_POST['id']);//dump($_POST);
            //$data=;
            if(!empty($id)){
                unset($_POST['password']);
                $tre=new LoginController();
                $response=$tre->checkName($_POST,$id);
                $this->save=['success'=>'修改成功','error'=>'修改失败'];
               //echo $id;dump($response);exit;
                if($response['status']){

                   if($this->model->addUser($_POST,$id)){
                       $this->jump()['success'];
                   }
                   else{
                       $this->jump()['error'];
                   }
               }else{
                   $this->save['error']='部门名称重复';
                    $this->jump()['error'];
                   //$this->error("部门名称重复",U("Admin/".$this->controller."/showList"),3);
               }
            } else{
                $this->save=['success'=>'保存成功','error'=>'保存失败'];
                if($this->model->addUser($_POST)){
                    $this->jump()['success'];
                }else{
                    $this->jump()['error'];
                   // $data['error'];
                }
            }
        }
    }


    public function savePhoto(){
        /*array(1) {  ["file"] => array(5) {    ["name"] => string(10) "Desert.jpg"    ["type"] => string(10) "image/jpeg"    ["tmp_name"] => string(24) "D:\xampp\tmp\php99DB.tmp"    ["error"] => int(0)    ["size"] => int(122739)  }}*/
        $photo = $_FILES['file'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub = false;
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      '/userPhoto/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->uploadOne($photo);
        if(!$info) {
            // 上传错误提示错误信息
            $this->ajaxReturn($upload->getError());
        }else{
            //获得用户信息
            $id = I("get.id");
            $path = $info['savepath'].$info['savename'];
            //将路径写入到表
            $this->model->savePhoto($id,$path);
            //$this->redirect('Admin/User/userList','',2, '页面跳转中...');
            $this->ajaxReturn(['url'=>$path]);
        }
    }

}