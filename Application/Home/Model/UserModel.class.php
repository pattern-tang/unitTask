<?php
/**
 * Created by PhpStorm.
 * Index: Index
 * Date: 2017/11/9
 * Time: 14:03
 */

namespace Home\Model;


use Think\Model;

class UserModel extends Model
{
    protected $tableName = 'user';
    public function __construct(){
        parent::__construct();
    }
    public function getUser(){
        //实例化一个表的对象
        $user = M("user");
        //获取表的数据
        return $user->where("status = 1")->select();
    }
    //数据库逻辑删除用户
    public function delUser($id){
        $user = M("user");
        $user->status = 0;
        return $user->where("id=$id")->save();
    }
    //查询某一个user用户
    public function getOneUser($id){
       return  $this->table("user")->where("id=$id")->select();
    }
    //保存修改
    public function upSave($id,$data){
       return $this->table("user")->where("id=$id")->save($data);
    }
}