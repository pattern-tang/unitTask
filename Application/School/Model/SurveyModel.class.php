<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 11:51
 */
namespace School\Model;
use Think\Model;
class SurveyModel extends Model{
    protected $exams;
    protected $stage;
    protected $relation;
    protected $achievement;
    public function __construct(){
        parent::__construct('papers');
        $this->achievement=M('achievement');
        $this->stage=M('stage');
        $this->exams=M('exams');
        $this->relation=M('relation');
    }
    public function selectList(){//$pageIndex=1,$pageSize=6
        /*SELECT  a.*,b.papers_name,c.unit,d.`name`, e.`name` as t_name,f.grade,g.class,h.course FROM seed_achievement a
LEFT JOIN seed_papers b on a.papers_id=b.id
LEFT JOIN seed_stage c on b.stage_id=c.id  LEFT JOIN seed_students d on a.user_id=d.id
LEFT JOIN seed_teacher e on b.teacher_id=e.id LEFT JOIN seed_grade f on c.grade_id=f.id
LEFT JOIN seed_class g on c.class_id=g.id LEFT JOIN seed_subject h on c.subject_id=h.id;*/
        $join=array(' LEFT JOIN seed_papers b on a.papers_id=b.id',
            ' LEFT JOIN seed_stage c on b.stage_id=c.id',
            ' LEFT JOIN seed_students d on a.user_id=d.id ',
            ' LEFT JOIN seed_teacher e on b.teacher_id=e.id',
            ' LEFT JOIN seed_grade f on c.grade_id=f.id',
            ' LEFT JOIN seed_class g on b.class_id=g.id',
            ' LEFT JOIN seed_subject h on c.subject_id=h.id'
            );
        $field=' a.*,b.papers_name,c.unit,d.`name`, e.`name` as t_name,f.grade,g.class,h.course ';
        $data = $this->achievement
            ->field($field)->join($join)
            ->where("a.`status`='1'")
            ->alias('a')
            ->select();//->page($pageIndex,$pageSize)
        return $data;
    }
    public function selectPaper(){
        /*SELECT a.*,b.unit,b.time,c.`name`,d.class,e.grade,f.course FROM seed_papers a LEFT JOIN seed_stage b on a.stage_id=b.id
LEFT JOIN seed_teacher c on a.teacher_id=c.id LEFT JOIN seed_class d on a.class_id=d.id
LEFT JOIN seed_grade e on b.grade_id=e.id LEFT JOIN seed_subject f on b.subject_id=f.id WHERE a.`status`='1';*/
        $join=array(' LEFT JOIN seed_stage b on a.stage_id=b.id',
            'LEFT JOIN seed_teacher c on a.teacher_id=c.id',
            ' LEFT JOIN seed_class d on a.class_id=d.id',
            'LEFT JOIN seed_grade e on b.grade_id=e.id',
            ' LEFT JOIN seed_subject f on b.subject_id=f.id'
            );
        $field=' a.*,b.unit,b.time,c.`name`,d.class,e.grade,f.course';
        return   $this->join($join)->field($field)->where("a.`status`='1'")->alias('a')->select();

    }
    //查询总共的条数
    public function getCount($index){
        if($index==1){
            return $this->achievement->where("status = '1'")->count();
        } elseif ($index==2){
           return $this->where("status = '1'")->count();
        } elseif ($index==3){
           return $this->exams->count();
        }
        elseif ($index==4){
            return $this->relation->count();
        }
       else{return false;}
    }
    //查询科目、年级、班级
    public function selectRow($index){
        if($index==1){return $this->table('seed_subject')->where("status='1'")->select();}
        elseif ($index==2){return $this->table('seed_grade')->select();}
        elseif($index==3){return $this->table('seed_class')->select();}
        elseif($index==4){return $this->table('seed_teacher')->field('id,name')->select();}
        else{return false;}
    }
    //保存
    public function stageAdd($data,$index){
        if($index==1 && $this->stage->add($data)){
            return $this->getLastInsID();
        }elseif ($index==2){
            return $this->add($data);
        }elseif ($index==3){
            return $this->exams->add($data);
        }
        else{return false;}
    }

    //试题库查询
    public function selectExams(){
        /*SELECT a.*,unit,time,grade,course FROM seed_exams a LEFT JOIN seed_stage b ON a.stage_id=b.id
        LEFT JOIN seed_grade c ON b.grade_id=c.id LEFT JOIN seed_subject d ON b.subject_id=d.id;*/
        $join=array('LEFT JOIN seed_stage b ON a.stage_id=b.id ',
            'LEFT JOIN seed_grade c ON b.grade_id=c.id',
            'LEFT JOIN seed_subject d ON b.subject_id=d.id'
        );
        //学生列表
        $field=' a.*,unit,time,grade,course';
        return   $this->exams->join($join)->field($field)->alias('a')->select();
    }
    //试题关联表
    public function selectRelation(){
        /* SELECT a.*,b.papers_name,c.topic,d.`name`,e.class,f.time,f.unit,g.course,h.grade FROM seed_relation a
LEFT JOIN seed_papers b ON a.papers_id=b.id LEFT JOIN seed_exams c ON a.exams_id=c.id
LEFT JOIN seed_teacher d on b.teacher_id=d.id LEFT JOIN seed_class e ON b.class_id=e.id LEFT JOIN seed_stage f ON b.stage_id=f.id
LEFT JOIN seed_subject g ON f.subject_id=g.id LEFT JOIN seed_grade h ON f.grade_id=h.id;*/
        $join=array('LEFT JOIN seed_papers b ON a.papers_id=b.id',
            'LEFT JOIN seed_exams c ON a.exams_id=c.id',
            'LEFT JOIN seed_teacher d on b.teacher_id=d.id',
            'LEFT JOIN seed_class e ON b.class_id=e.id',
            'LEFT JOIN seed_stage f ON b.stage_id=f.id',
            'LEFT JOIN seed_subject g ON f.subject_id=g.id',
            'LEFT JOIN seed_grade h ON f.grade_id=h.id',
            'LEFT JOIN seed_student_info j ON a.user_id=j.id'
        );
        $field='a.*,b.papers_name,c.topic,d.`name`,e.class,f.time,f.unit,g.course,h.grade,j.`name` AS s_name';
        return   $this->relation->join($join)->field($field)->where("a.`status`='1'")->alias('a')->select();
    }
}