<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 11:47
 */
namespace School\Controller;
use School\Common\TestController;
class ClassroomController extends TestController{
    protected $model;
    public function __construct()
    {parent::__construct();
        $this->title['middle']='教务管理';
        $this->model=D('Classroom');
    }

    //教务列表
    public function registrar(){
        $this->title['min']='教师管理';
        $getCount=$this->model->getCount(1);
        $this->assign('title',$this->title);
        $data=$this->model->selectList();
        //dump($data);exit;
        $this->assign('list',$data);
        $this->assign('count',$getCount);
        $this->assign('order',1);//赋值序号
        $this->display('teacher-list');
    }
    //新增保存
    public function saveTeacher(){
        //echo '<pre>';print_r($_POST);print_r($_FILES); exit;
        /* [userName] => sdfag
    [sex] => 1
    [phone] => 234
    [email] => gdfg
    [photo] =>
    [user-address] => gdsafg
    [teacherInfo] =>
)*/

    }
    /*城市下标联动*/
    public function selectCity(){
        if(isset($_POST['parent_id'])){
            $this->ajaxReturn($this->model->area(I('post.parent_id')));
        }
        else{
           $this->ajaxReturn(false);
        }
    }
    //意见反馈
    public function feedbackList(){

        $this->title['min']='意见反馈';
        $this->assign('title',$this->title);
        $this->display('feedback-list');
    }
}
