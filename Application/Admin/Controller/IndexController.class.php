<?php
/**
 * Created by PhpStorm.
 * Index: Administrator
 * Date: 2017/11/10
 * Time: 9:55
 */

namespace Admin\Controller;
use Admin\Common\BaseController;

class IndexController extends BaseController {
    protected $model;
    public function __construct(){
        parent::__construct();
        $this->model = D('User');
    }

    public function userList(){
        //$pageIndex = I('p',1);
        //$data = $this->model->getList($pageIndex,10);
        //获取记录总条数
        $count=6;
        $getCount=$this->model->getCount();
        $page=new \Think\Page($getCount,$count);
        $page=$page->show();
        $pageIndex = I('p',1);

        $data = $this->model->selectList($pageIndex,$count);
        for($i=0;$i<count($data);$i++){
            $data[$i]['status']='正常';
            if($data[$i]['level']==1){
                $data[$i]['level']='管理员';
            }else{
                $data[$i]['level']='普通用户';
            }
        }
        $order=($pageIndex-1)*$count+1;
        //$show=$this->model->selectList('show');
        $this->assign('page',$page);
        //赋值序号
        $this->assign('order',$order);
        //赋值数组
        $this->assign('list',$data);
        //赋值标题
        $this->assign('title',$this->title);
        //显示页面
        //echo '<pre>';print_r($data);
        $this->display("./User/list");
    }
    //逻辑删除
    public function delUser(){
        if(IS_GET){
            $id=I('get.id');
            $admin=strstr($id,',',true);
            //dump($id);
            if($admin!=1){
              if(strpos($id,',')&&$this->model->runDelete($id)){
                  $this->success('删除成功',U('Admin/Index/userList'),1);
              }
              elseif ($this->model->delUser($id)) {
                  $this->success('删除成功',U('Admin/Index/userList'),1);
              } else{
                  $this->error('删除失败',U("Admin/Index/userList"),2);
              }
            }else{
                $this->error('请联系管理员，最高权限不能删除',U("Admin/Index/userList"),2);
            }
        }
    }
    //显示修改页面
    public function viewUpdate(){
        $id   = I('get.id');
        if($id==1){
            $this->error('请联系管理员，最高权限不能修改',U("Admin/Index/userList"),2);
        }
        $band=D('User')->selectShow();
        $row  = $this->model->getOneUser($id);
        $this->assign('title',$this->title);
        $this->assign("user",$row[0]);
        $this->assign('branch',$band['branch']);
        $this->assign('role',$band['role']);

        $this->display("./User/Update");

    }
    //显示权限页
    public function showRbac(){
        $id=I('get.id');
        $data=$this->model->getRbac($id);
        $this->assign('list',$data);
        $this->title['min']='权限管理';
        $this->assign('title',$this->title);
        $this->assign('order',1);
        $this->assign('user_id',$id);

        $this->display('./Menu/rbac');
    }
    //保存修改或增加
    public function saveRbac1(){
        $id=I('post.id');
        unset($_POST['id']);
        $return=$this->model->rollRbac($id);
        if($return!==false){
            mysql_query('BEGIN');
            foreach($_POST as $key=>$vo){
                $tmp=explode('_',$key);
                $menu_id=$tmp[1];
                $filedName=$tmp[2];
                //dump($tmp);
                $flag=$this->model->updateRbac($menu_id,$id,$filedName);
                if(!$flag){
                    mysql_query('ROLLBACK');
                    $this->error('修改失败',U('Admin/Index/userList'),2);
                }
            }//exit;
            mysql_query('COMMIT');
            $this->success('修改成功',U('Admin/Index/userList'),2);

        }else $this->error('数据修改失败',U('Admin/Index/userList'),3);
    }
//js保存修改或增加
    public function saveRbac2(){
        //dump($_POST);
        $rbac = I('post.arr');
        $id   = I('post.id');
        //开启事务
        mysql_query('BEGIN');
        foreach($rbac as $key=>$vo){
            $data=array();
            $data['menu_id']=$key;
            $data['user_id']=$id;
            $data['add']=$vo['add'];
            $data['delete']=$vo['delete'];
            $data['update']=$vo['update'];
            $data['search']=$vo['search'];
            $affair=$this->model->saveRbac($data);
            //判断这一次操作是否成功，如果不成功就回滚事务
            if($affair==false){
                mysql_query('ROLLBACK');
                $this->ajaxReturn(false);
            }
        }
        //所有操作结束 提交事务
        mysql_query('COMMIT');
        $this->ajaxReturn(true);
    }
    public function cancel(){
        session_destroy();
        $this->redirect('Admin/Login/index','',1, '页面跳转中...');
    }
}
