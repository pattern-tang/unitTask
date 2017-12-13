<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 11:35
 */
namespace Admin\Model;

use Think\Model;

class UserModel extends Model{
    protected $access;
    public function __construct(){
        parent::__construct('user');
        $this->access=M('access');
    }

    //按指定条件查询一个记录
    public function findRow($acc,$pass){
        $where="account='$acc' || phone='$acc' AND password='$pass' ";
        $data=$this->where($where)->select();
        return $data[0];
    }
    //读取列表
    public function selectList($pageIndex=1,$pageSize=6){
        $join=array(' LEFT JOIN branch b ON a.branch_id = b.id',' LEFT JOIN role c ON a.role_id = c.id');
        $field='a.*,b.name AS b_name,c.name AS c_name ';
        $data = $this->field($field)->join($join)->where("a.status='1'")
            ->page($pageIndex,$pageSize)->alias('a')->select();

        return $data;
}
    //检测用户名是否存在
    public function checkName($code){
        // 检测是否为数字否则字符串;
        if(is_numeric($code)){
            $number='phone='.$code;
        }else{
            $number = "account='$code'";
        }
        return $this->where($number)->count();
    }
    //查询部门、角色
    public function selectShow(){
        $data['branch']=$this->table('branch')->select();
        $data['role']=$this->table('role')->select();
        return $data;
    }
    //保存图片
    public function savePhoto($id,$path){
       $data = ['photo'=>$path];
       $this->where("id=$id")->save($data);
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
    //保存新增\保存修改
    public function addUser($post,$id=0){
        if($id>0){
            $where='id='.$id;
            return $this->where($where)->save($post);
        }else{
            return $this->add($post);
        }
    }
    //检测特定字段是否有特定值  排除id
    public function checkNumber($key,$val,$id=0){
        return $this->where("`$key`='".$val."' and id!=".$id)->count();
    }
    //查询总共的条数
    public function getCount(){
        return $this->where("status = '1'")->count();
    }
    //执行删除  $id=1  $id='1,2,3'
    public function runDelete($id){
        return $this->where("id in($id)")->save(["status"=>0]);
    }
    //按指定查询
    public function getRbac($id){
        //$access=M('access');
        $data=M('menu')->select();
        foreach ($data as $vo){
            $menu_id=$vo['id'];
            $user_id=$id;
            $where="user_id=$user_id and menu_id=$menu_id ";
            if($this->access->where($where)->count()<1){
                $this->access->add(['user_id'=>$user_id,'menu_id'=>$menu_id]);
            }
        }
        return $this->access->field('m.id,m.name,a.add,a.update,a.delete,a.search')
            ->join('menu m ON m.id=a.menu_id ')
            ->where('user_id='.$id.' AND m.status=1')->alias('a')->select();
    }
    //将原来的权限全部设置成0
    public function rollRbac($user_id){
        //如果里面有权限就是修改  如果没有  就要增加
        $data['add']=0;
        $data['delete']=0;
        $data['update']=0;
        $data['search']=0;
        //$access = M("access");
        return $this->access->data($data)->where("user_id=$user_id")->save();
    }
    //修改权限
    public function updateRbac($menu_id,$user_id,$filedName){
        $data[$filedName]=1;
        $where="menu_id=$menu_id AND user_id=$user_id ";
        //$access=M('access');
        if($this->access->where($where)->count()>0){
            //执行修改
            return $this->access->where($where)->save($data);
        }else{
            $data['add']=0;
            $data['delete']=0;
            $data['update']=0;
            $data['search']=0;
            $data['menu_id']=$menu_id;
            $data['user_id']=$user_id;
            //执行增加
            return $this->access->data($data)->add();
        }
    }
    //写入权限
    public function saveRbac($data){
        //判断修改还是增加
        $where ="menu_id=".$data['menu_id']." and user_id=".$data['user_id'];
        if($this->access->where($where)->count()>0){
            return $this->access->where($where)->data($data)->save();
        }
        else{
            return $this->access->data($data)->add();
        }
    }

}