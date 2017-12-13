<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/12/6
 * Time: 10:41
 */
namespace School\Model;
use Think\Model;
class StudentModel extends Model
{
    public function __construct(){
        parent::__construct('student_info');

    }
    public function StudentList(){
        return $this->select();
    }
    //查询总共的条数
    public function getCount($index){
        if($index==1){
            return $this->count();
        }
        else{return false;}
    }
}
