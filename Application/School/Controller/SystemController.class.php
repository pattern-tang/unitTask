<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 17:44
 */
namespace School\Controller;
use School\Common\TestController;
//use School\Common\TitleController;

class SystemController extends TestController{
    public function __construct()
    {
        parent::__construct();
        $this->title['middle'] = '系统管理';
    }
    public function systemBase(){
        //系统设置
        $this->title['min']='系统设置';
        $this->assign('title',$this->title);
        $this->display('system-base');
    }
    public function systemCategory(){
        //栏目管理
        $this->title['min']='栏目管理';
        $this->assign('title',$this->title);
        $this->display('system-category');
    }
    public function systemData(){
        //数据字典
        $this->title['min']='数据字典';
        $this->assign('title',$this->title);
        $this->display('system-data');
    }
    public function systemShielding(){
        //屏蔽词
        $this->title['min']='基本设置';
        $this->assign('title',$this->title);
        $this->display('system-shielding');
    }
    public function systemLog(){
        //系统日志
        $this->title['min']='系统日志';
        $this->assign('title',$this->title);
        $this->display('system-log');
    }
}