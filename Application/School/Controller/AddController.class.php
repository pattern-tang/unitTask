<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 18:15
 */
namespace School\Controller;

use School\Common\TitleController;

class AddController extends TitleController
{   protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->model=D('Classroom');
    }
    public function articleAdd(){
        //添加试卷
        $subject=$this->model->selectRow(1);
        $grade=$this->model->selectRow(2);
        $class=$this->model->selectRow(3);
        $teacher=$this->model->selectRow(4);
        $this->assign('subject',$subject);
        $this->assign('grade',$grade);
        $this->assign('class',$class);
        $this->assign('teacher',$teacher);
        $this->display('article-add');
    }
    public function examsAdd(){
        //添加试卷
        $subject=$this->model->selectRow(1);
        $grade=$this->model->selectRow(2);
        $this->assign('subject',$subject);
        $this->assign('grade',$grade);
        $this->display('exams-add');
    }
    public function pictureAdd(){
        //添加资讯图片

        $this->display('picture-add');
    }
    public function productAdd(){
        //添加资讯产品

        $this->display('product-add');
    }     //添加老师
    public function teacherAdd(){
        $province=$this->model->area('a');
        $this->assign('province',$province);

        $this->display('teacher-add');
    }
    public function memberAdd(){
        //添加用户

        $this->display('member-add');
    }
    public function productCA(){
        //添加产品分类
       // $this->display('product-category-add');
        $this->display('system-category-add');
    }

}