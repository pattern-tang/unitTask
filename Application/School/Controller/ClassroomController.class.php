<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 11:47
 */
namespace School\Controller;
use School\Common\TestController;
class ClassroomController extends TestController{
    protected $model;
    public function __construct()
    {parent::__construct();
        $this->title['middle']='教务管理';
        $this->model=D('Classroom');
    }
    //教务列表
    public function registrar(){
        $this->title['min']='教师管理';
        $getCount=$this->model->getCount(1);
        $this->assign('title',$this->title);
        $data=$this->model->selectList();
        //dump($data);exit;
        $this->assign('list',$data);
        $this->assign('count',$getCount);
        $this->assign('order',1);//赋值序号
        $this->display('teacher-list');
    }
    //新增保存
    public function saveTeacher(){
        //echo '<pre>';print_r($_POST);print_r($_FILES); exit;

//思路：先存seed_address\地址表；再存head_photo图片，通过返回id最后存seed_teacher、教师详情表；
        if(IS_POST){
            $this->model->startTrans();//开启事务
            $address['province']=I('post.province');
            $address['city']=I('post.city');
            $address['zone']=I('post.zone');
            $address['address']=I('post.address','','trim,addslashes');
            $address['postalcode']=I('post.postalcode','','trim');
            //$head['']=
            $data=$this->model->saveAdd($address,1);
            if($data>0){
                $teacher['name']=I('post.userName','','trim,addslashes');
                $teacher['phone']=I('post.phone','','trim');
                $teacher['sex']=I('post.sex');
                $teacher['password']=I('post.password','','trim,MD5');
                $teacher['email']=I('post.email','','trim,addslashes');
                $teacher['position_id']=I('post.position_id');
                $teacher['education']=I('post.education');
                $teacher['aptitude']=I('post.aptitude');
                $teacher['marital']=I('post.marital');
                $teacher['nation_id']=I('post.nation');
                $teacher['address_id']=$data;
                if($this->model->saveAdd($teacher,3)){
                    $this->model->commit();//提交事务
                    $this->ajaxReturn(true);
                }else{
                    $this->model->rollback();//回滚事务
                    $this->ajaxReturn(false);
                }
            }else{
                $this->model->rollback();//回滚事务
                $this->ajaxReturn(false);
            }
        }
    }
    //图片保存
    public function savePhoto(){
       /* print_r($_FILES);print_r($_GET);
       dump($_POST);exit;*/
         //设置图片id
        $id = I("get.id");
       if(IS_POST){
           $upload = new \Think\Upload();// 实例化上传类
           $upload->maxSize = 3145728 ;// 设置附件上传大小
           $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->savePath  = './Public/'; // 设置附件上传目录
           $info =   $upload->uploadOne($_FILES['file']);
           if(!$info) {
               // 上传错误提示错误信息
               //$this->error($upload->getError());
               $this->ajaxReturn($upload->getError());
           }else{
               // 上传成功 获取上传文件信息
               //获得用户信息
               $path = $info['savepath'].$info['savename'];
               $paid=$this->model->saveAdd(['img'=>"$path"],2); //将路径写入到表
               session('paid',$paid);
               if($paid>0&&$id!=''){
                   if ($this->model->savePhoto($id,$paid)){
                       $this->ajaxReturn(['url'=>'图片保存成功，地址：'.$path]);
                       //$this->ajaxReturn(['url'=>"$path"]);
                   }
               }else{
                   $this->ajaxReturn("alert('数据保存失败');window.history.back();",'EVAL');
                   //echo "<script></script>";
                   return;
               }
           }
       }elseif(IS_GET){
           $inEcho=I('get.info','','trim,addslashes');
           //dump($_GET); dump();return;
           $paid=$_SESSION['paid'];
           if(!empty($inEcho) && !empty($paid)){
               //修改当前图片备注
               if($this->model->savePhoto($paid,['info'=>$inEcho])){
                   echo "<script>alert('修改成功');window.parent.location.href='".U('School/Classroom/registrar')."'</script>";
                   //redirect(U('School/Classroom/registrar'),2,'修改成功');
                  return;
               }
           } else{
               echo "<script>alert('数据错误');window.history.back();</script>";
               //$this->error('修改失败',"<script>window.history.back();</script>",3);
                   }
       }else{
           //$this->error('数据错误',"<script>window.history.back();</script>",3);
           echo "<script>alert('数据错误');window.history.back();</script>";
       }

    }
    /*城市下标联动*/
    public function selectCity(){
        if(isset($_POST['parent_id'])){
            $this->ajaxReturn($this->model->area(I('post.parent_id')));
        }
        else{
           $this->ajaxReturn(false);
        }
    }
    public function deleteList(){
        $id=I('get.id');
    }
    //意见反馈
    public function feedbackList(){
        $this->title['min']='意见反馈';
        $this->assign('title',$this->title);
        $this->display('feedback-list');
    }
}
