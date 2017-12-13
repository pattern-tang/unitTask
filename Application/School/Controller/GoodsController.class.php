<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/25
 * Time: 15:10
 */
namespace School\Controller;
use School\Common\TestController;
class GoodsController extends TestController{
    public function __construct()
    {parent::__construct();
        $this->title['middle']='产品管理';
    }

    public function pictureList(){
        //图片管理
        $this->title['middle']='图片管理';
        $this->title['min']='图片列表';
        $this->assign('title',$this->title);
        $this->display('picture-list');
    }
    public function pictureShow(){
        //图片管理
        $this->title['middle']='图片管理';
        $this->title['min']='图片展示';
        $this->assign('title',$this->title);
        $this->display('picture-show');
    }
    public function productBrand(){
        //品牌管理
        $this->title['min']='品牌管理';
        $this->assign('title',$this->title);
        $this->display('product-brand');
    }
    public function productCategory(){
        //分类管理
        $this->title['min']='产品分类';
        $this->assign('title',$this->title);
        $this->display('product-category');
    }
    public function productList(){
        //产品管理
        $this->title['middle']='产品管理';
        $this->title['min']='产品列表';
        $this->assign('title',$this->title);
        $this->display('product-list');
    }

   /* public function adminRole(){
        //角色管理
        $this->title['min']='角色管理';
        $this->assign('title',$this->title);
        $this->display('admin-role');
    }
    public function adminPermission(){
        //权限管理

        $this->title['min']='权限管理';
        $this->assign('title',$this->title);
        $this->display('admin-permission');
    } //管理员列表
    public function adminList(){

        $this->title['min']='管理员列表';
        $this->assign('title',$this->title);
        $this->display('admin-list');
    }*/
}