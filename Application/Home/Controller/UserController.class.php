<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        //实例化一个模型
        $user = D("User");
        $data = $user->getUser();
        $title = "我是一个漂亮的标题";
        $this->assign("user",$data);
        $this->assign("xuhao",1);
        $this->assign('title',$title);
        $this->display('User');
    }

    //删除用户
    public function deleteUser(){
        $id = I('get.id');
        $user = D("User");
        $status = $user->delUser($id);
        if($status){
            $this->success('删除成功',U("Home/Index/index"),3);
        }
        else{
            $this->error('删除失败',U("Home/Index/index"),3);
        }
    }
    //显示修改页面
    public function viewUpdate(){
        $id   = I('get.id');
        $user = D('user');
        $row  = $user->getOneUser($id);
        $this->assign("user",$row[0]);

        $this->display("Update");

    }
    //保存修改的方法
    public function updateSave(){
      $data['name']=I("post.name");
      $id = I("post.id");
      //业务 是否使用，格式合法  优惠  ...

      //保存
        $user = D("user");

        $status = $user->upSave($id,$data);
        if($status){
         $this->success('修改成功',U("Home/Index/index"),3);
        }
        else{
         $this->error('修改失败',U("Home/Index/index"),3);
        }



    }

}
/*function dump($data){
    echo '<pre>';
    print_r($data);
}*/