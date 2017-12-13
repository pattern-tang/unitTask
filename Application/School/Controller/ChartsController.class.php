<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 15:43
 */
namespace School\Controller;
use School\Common\TestController;
class ChartsController extends TestController{
    public function __construct()
    {parent::__construct();
        $this->title['middle']='统计管理';
    }

    public function charts1(){
        //折线图
        $this->title['min']='折线图';
        $this->assign('title',$this->title);
        $this->display('charts-1');
    }
    public function charts2(){
        //时间轴折线图
        $this->title['min']='时间轴折线图';
        $this->assign('title',$this->title);
        $this->display('charts-2');
    }
    public function charts3(){
        //区域图
        $this->title['min']='区域图';
        $this->assign('title',$this->title);
        $this->display('charts-3');
    }
    public function charts4(){
        //柱状图
        $this->title['min']='柱状图';
        $this->assign('title',$this->title);
        $this->display('charts-4');
    }
    public function charts5(){
        //饼状图
        $this->title['min']='饼状图';
        $this->assign('title',$this->title);
        $this->display('charts-5');
    }
    public function charts6(){
        //3D柱状图
        $this->title['min']='3D柱状图';
        $this->assign('title',$this->title);
        $this->display('charts-6');
    }
    public function charts7(){
        //3D饼状图
        $this->title['min']='3D饼状图';
        $this->assign('title',$this->title);
        $this->display('charts-7');
    }
}