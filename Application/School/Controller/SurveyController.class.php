<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 16:37
 */
namespace School\Controller;
use School\Common\TestController;
class SurveyController extends TestController
{   protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->title['middle'] = '试卷管理';
        $this->model=D('Survey');
    }

    public function articleList(){
        $getCount=$this->model->getCount(1);
        /*$count=6; //总条数
         * $page=new \Think\Page($getCount,$count);
        $page=$page->show();
        $pageIndex = I('p',1);
        $order=($pageIndex-1)*$count+1;
        $this->assign('page',$page);*/
        $data=$this->model->selectList();
        $this->assign('order',1);
        //赋值数组
        $this->assign('list',$data);
        $this->assign('count',$getCount);
        //dump($data);exit;
        $this->title['min']='学生试卷表';
        $this->assign('title',$this->title);
        $this->display('article-list');
    }
    //data-href="article-add.html"
    public function articlePaper(){
        $getCount=$this->model->getCount(2);
        $this->assign('count',$getCount);
        $data=$this->model->selectPaper();
        $this->assign('order',1);
        //赋值数组
        $this->assign('list',$data);
        $this->title['min']='试卷列表';
        $this->assign('title',$this->title);
        $this->display('article-show');
    }
    //保存addPaper
    public function addPaper(){
        if(IS_POST){
            //echo '<pre>';print_r($_POST);exit;
            /* [papers_name] => adfasdfa
    [unit] => asdfd
    [fractions] => 230
    [course_id] => 2
    [grade_id] => 6
    [class_id] => 3
    [teacher_id] => 4*/
            //分别插入两张表seed_paper、seed_stage
            //先放学习阶段表；取得返回id,再放试卷表；
            $this->model->startTrans();//开启事务
            $data['grade_id']=I('post.grade_id');
            $data['unit']=I('post.unit','','trim,addslashes');
            $data['subject_id']=I('post.subject_id');
            $data['time']=date('Y-m-d');
            $stage=$this->model->stageAdd($data,1);
            if($stage==false){$this->model->getError();exit($this->model->rollback());}//回滚事务
            $paper['papers_name']=I('post.papers_name','','trim,addslashes');
            $paper['teacher_id']=I('post.teacher_id');
            $paper['class_id']=I('post.class_id');
            $paper['stage_id']=$stage;
            $paper['fractions']=I('post.fractions','100','trim');

            if($this->model->stageAdd($paper,2) ==false){
                $this->model->rollback();//回滚事务
                $this->ajaxReturn(false);
            }else{
                $this->model->commit();//提交事务
                $this->ajaxReturn(true);
            }
        }
    }
    //试题库
    public function articleExams(){
        $getCount=$this->model->getCount(3);
        $this->assign('count',$getCount);
        $data=$this->model->selectExams();
        //echo '<pre>';print_r($data);exit;
        $this->assign('order',1);
        //赋值数组
        $this->assign('list',$data);
        $this->title['min']='试题库';
        $this->assign('title',$this->title);
        $this->display('article-exams');
    }   //保存试题
    public function addExams(){
        //echo '<pre>';print_r($_POST);exit;
       //seed_exams、seed_stage
        if (IS_POST){
            $this->model->startTrans();//开启事务
            $data['grade_id']=I('post.grade_id');
            $data['unit']=I('post.unit','','trim,addslashes');
            $data['subject_id']=I('post.subject_id');
            $data['time']=date('Y-m-d');
            $stage=$this->model->stageAdd($data,1);
            if(!$stage){$this->model->getError();exit($this->model->rollback());}//回滚事务
            $exams['topic']=I('post.topic','','trim,addslashes');
            $exams['A']=I('post.A','','trim,addslashes');
            $exams['B']=I('post.B','','trim,addslashes');
            $exams['C']=I('post.C','','trim,addslashes');
            $exams['D']=I('post.D','','trim,addslashes');
            $exams['E']=I('post.E','','trim,addslashes');
            $exams['stage_id']=$stage;
            $exams['source']=$_SESSION['uName'];
            if(!$this->model->stageAdd($exams,3) ){
                $this->model->rollback();//回滚事务
                $this->ajaxReturn(false);
            }else{
                $this->model->commit();//提交事务
                $this->ajaxReturn(true);
            }
        }
    }
    //试题关联表
    public function articleRelation(){
        $relation=$this->model->selectRelation();
        //dump($relation);exit;
        $getCount=$this->model->getCount(4);
        $this->assign('count',$getCount);
        //赋值数组
        $this->assign('list',$relation);
        $this->title['min']='试题关联表';
        $this->assign('title',$this->title);
        $this->assign('order',1);
        $this->display('article-relation');
    }

}