<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/12/6
 * Time: 10:32
 */
namespace School\Controller;
use School\Common\TestController;
class StudentController extends TestController
{   protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->title['middle'] = '学生管理';
        $this->model=D('Student');
    }
    public function StudentList(){
        $getCount=$this->model->getCount(1);
        $this->assign('count',$getCount);
        $data=$this->model->StudentList();
        $this->assign("list",$data);
        $this->title['min']='学生列表';
        $this->assign('order',1);//赋值序号
        $this->assign('title',$this->title);

        $this->display("StudentList");
    }
    public function pictureList(){
    //图片管理
    $this->title['middle']='图片管理';
    $this->title['min']='图片列表';
    $this->assign('title',$this->title);
    $this->display('picture-list');
}
}
