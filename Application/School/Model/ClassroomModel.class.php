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

    public function __construct()
    {
        parent::__construct('teacher');
        $this->area = M('area');

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
}