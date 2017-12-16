<?php
/**
 * Created by PhpStorm.
 * Index: Index
 * Date: 2017/11/9
 * Time: 14:03
 */

namespace School\Model;
use Think\Model;

class UserModel extends Model
{

    public function __construct(){
        parent::__construct('user');
    }
    public function getUser(){
        //实例化一个表的对象
        //获取表的数据
        return $this->where("status = '1'")->select();
    }
    public function findOne($id){
        return $this->table('seed_menu')->where('id='.$id)->select()[0];
    }
    //按指定条件查询一个记录
    public function checkRow($table,$acc,$pass){
        $where="email='$acc' || phone='$acc' AND password='$pass' ";
        $data=$this->table($table)->field('id,name,phone,email')->where($where)->select();
        return $data[0];
    }
    //查询科目、年级、班级、老师
    public function selectRow($index){
        if($index==1){return $this->table('seed_subject')->where("status='1'")->select();}
        elseif ($index==2){return $this->table('seed_grade')->select();}
        elseif($index==3){return $this->table('seed_class')->select();}
        elseif($index==4){return $this->table('seed_teacher')->field('id,name')->select();}
        elseif($index==5){return $this->table('seed_nation')->select();}
        elseif($index==6){return $this->table('seed_position')->select();}
        else{return false;}
    }
    //数据库逻辑删除用户
    public function delUser($id){
        //$user = M("user");
        $this->status = 0;
        return $this->where("id=$id")->save();
    }
    //查询某一个user用户
    public function getOneUser($id){
       return  $this->where("id=$id")->select();
    }
    //保存修改
    public function upSave($id,$data){
       return $this->where("id=$id")->save($data);
    }
}