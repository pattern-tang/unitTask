<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 10:59
 */
namespace Admin\Controller;

use Admin\Common\BaseController;
use Think\Page;

class BranchController extends BaseController {
   public $nav = ['部门新增','部门修改'];
   public $model;
   public $controller="Branch";
   public function __construct()
   {
       parent::__construct();
       $this->model=D("Branch");
       $this->title['middle']='部门管理';
       $this->title['min']='部门列表';
   }

   //显示列表
   public function showList(){
        $this->assign('title',$this->title);
        //获得当前页码
        $pageIndex = I('p',1);
        $data = $this->model->getList($pageIndex,10);
        //获取记录总条数
        $count = $this->model->getCount();
        $page  = new Page($count,10);
        $pagination  = $page->show();
        $this->assign('pagination',$pagination);
        $this->assign('list',$data);
        $this->assign('order',1);
        $this->display("list");


   }
   //显示新增
   public function showAdd(){
       $this->title['min']=$this->nav[1];
       $this->assign('title',$this->title);
       $this->display("add");
   }
   //ajax验证重复
   public function check($data = array()){
       $param=$data;
       if(empty($data)){
           $param = $_POST;
       }
       $key = array_keys($param)[0];
       $val = $param[$key];
       //调用模型的方法检测数量
       $number = $this->model->checkNumber($key,$val);
       $response = ['status'=>false,'message'=>'该内容已经存在，限制使用。'];

       if($number>0){
           if(empty($data)){
               $this->ajaxReturn($response);
           }
           else{
               return $response;
           }
       }
       else{
           $response = ['status'=>true,'message'=>'该内容可以使用'];
           if(empty($data)){
               $this->ajaxReturn($response);
           }
           else{
               return $response;
           }
       }
   }
   //保存新增
    public function addSave(){
       $data = $_POST;
       if($this->model->addSave($data)){
           $this->success("新增成功",U("Admin/".$this->controller."/showList"),2);
       }
       else{
           $this->error("数据库保存失败",U("Admin/".$this->controller."/showAdd"),3);
       }
    }
    //执行删除
    public function runDelete(){
        $id = I("get.id");
        if($this->model->runDelete($id)){
            $this->success("删除成功",U("Admin/".$this->controller."/showList"),2);
        }
        else{
            $this->error("删除失败",U("Admin/".$this->controller."/showList"),2);
        }
    }
    //显示修改
    public function showUpdate(){
        $id = I("get.id");
        //获得一行记录
        $row = $this->model->getRow($id);
        $this->title['min']=$this->nav[2];
        $this->assign('title',$this->title);
        $this->assign('info',$row);
        //显示修改页面
        $this->display('update');
    }
    //保存修改
    public function updateSave(){
        $id = I("post.id");
        unset($_POST['id']);
        $data = $_POST;
        //检测名称是否重复
        $response = $this->check($data,true);
        if($response['status']){
             //执行修改
             if($this->model->updateSave($data,$id)){
                 $this->success("修改成功",U("Admin/".$this->controller."/showList"),3);
             }
             else{
                 $this->error("部门修改失败",U("Admin/".$this->controller."/showList"),3);
             }
        }
        else{
            $this->error("部门名称重复",U("Admin/".$this->controller."/showList"),3);
        }

    }


}