<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/12/8
 * Time: 10:57
 */
namespace School\Model;
use Think\Model;
class ClassroomModel extends Model
{
    protected $area;
    protected $address;
    protected $photo;
    public function __construct()
    {
        parent::__construct('teacher');
        $this->area = M('area');
        $this->address=M('address');
        $this->photo=M('info_photo');
    }
    public function selectList(){
        /*SELECT a.*,b.`n_province` ,b.address,b.n_city,b.n_zone,c.`name` AS p_name FROM seed_teacher a
         * LEFT JOIN view_address b ON a.address_id=b.id  LEFT JOIN seed_position c ON a.position_id=c.id
        */
        $join=array('LEFT JOIN view_address b ON a.address_id=b.id',
            'LEFT JOIN seed_position c ON a.position_id=c.id'
        );
        $field=' a.*,b.`n_province` ,b.address,b.n_city,b.n_zone,c.`name` AS p_name';
        return   $this->join($join)->field($field)->where("a.`status`='1'")->alias('a')->select();
    }
    //查询总共的条数
    public function getCount($index){
        if($index==1){
            return $this->where("status = '1'")->count();
        }
        else{return false;}
    }
    public function area($index){
        if($index=='a'){
            return $this->area->where('parent_id=0')->select();
        }
       elseif (is_numeric($index)){
           return $this->area
               ->field('a.*,b.name AS ci_na,b.id AS ci_id')
               ->join('INNER JOIN seed_area b ON a.id=b.parent_id ')
               ->where($index.'=a.id')->alias('a')->select();
       }else{return false;}
    }
    //保存教师详情
    public function saveAdd($data,$p){
        //思路：先存seed_address\地址表；再存head_photo图片，通过返回id最后存seed_teacher、教师详情表；
        if($p==1 and $this->address->add($data)){
            return $this->address->getLastInsID();
        }elseif ($p==2 and $this->photo->add($data)){
            return $this->photo->getLastInsID();
        }elseif ($p==3){
            return $this->add($data);
        }else{return false;}
    }
    public function savePhoto($id,$path){
        if(is_numeric($path)){
            $data = ['info_photo_id'=>$path];
            return    $this->where("id=$id")->save($data);
        }elseif(is_array($path)){
            return   $this->photo->where('id='.$id)->save($path);
        }else{return false;}

    }
}