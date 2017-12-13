<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 11:02
 */
namespace Admin\Model;

use Think\Model;

class MenuModel extends Model{
    protected $tableName="menu";
    public function __construct()
    {
        parent::__construct();
    }
    //读取列表
    public function getList($pageIndex=1,$pageSize=10){
        $data = $this->table($this->tableName)->page($pageIndex,$pageSize)
            ->where("status = '1'")->select();
        return $data;
    }
    //查询总共的条数
    public function getCount(){
        return $this->table($this->tableName)->where("status = '1'")->count();
    }
    //检测特定字段是否有特定值  排除id
    public function checkNumber($key,$val,$id=0){
        return $this->table($this->tableName)->where("`$key`='".$val."' and id!=".$id)->count();
    }
    //保存新增
    public function addSave($data){
        if($this->table($this->tableName)->add($data)){
            //返回插入的id
            return $this->getLastInsID();
        }
        else{
            return false;
        }
    }
    //执行删除  $id=1  $id='1,2,3'
    public function runDelete($id){
        return $this->table($this->tableName)->where("id in($id)")->save(["status"=>0]);
    }
    //获取一行数据
    public function getRow($id){
        return $this->table($this->tableName)->where("id=$id")->select()[0];
    }
    //保存修改
    public function updateSave($data,$id){
        return $this->table($this->tableName)->where("id=$id")->save($data);
    }


}