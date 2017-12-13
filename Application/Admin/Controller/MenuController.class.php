<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 11:42
 */
namespace Admin\Controller;
use Admin\Common\BaseController;


class MenuController extends BaseController {
    public $nav = ['菜单新增','菜单修改'];
    public $model;
    public $controller="Role";
    public function __construct()
    {
        parent::__construct();
        $this->model=D("Menu");
        $this->title['middle']='菜单管理';
        $this->title['min']='菜单列表';
    }

    //显示列表
    public function showList(){
        $this->assign('title',$this->title);
        //获得当前页码
        $pageIndex = I('p',1);$count=5;
        $order=($pageIndex-1)*$count+1;
        $data = $this->model->getList($pageIndex,$count);
        //获取记录总条数
        $count = $this->model->getCount();
        $page  = new \Think\Page($count,10);
        $pagination  = $page->show();
        $this->assign('pagination',$pagination);
        $this->assign('list',$data);
        $this->assign('order',$order);
        $this->display("list");
    }
    //显示新增
    public function showAdd(){
        $this->title['min']=$this->nav[1];
        $this->assign('title',$this->title);
        $this->display("add");
    }
}