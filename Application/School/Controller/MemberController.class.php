<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/11/29
 * Time: 17:01
 */
namespace School\Controller;
use School\Common\TestController;
class MemberController extends TestController
{
    public function __construct()
    {
        parent::__construct();
        $this->title['middle'] = '用户中心';
    }

    public function memberList(){
        //会员列表
        $this->title['min']='用户管理';
        $this->assign('title',$this->title);
        $this->display('member-list');
    }

    public function memberDel(){
        //删除的会员
        $this->title['min']='添加用户';
        $this->assign('title',$this->title);
        $this->display('member-del');
    }
    public function memberRB(){
        //浏览记录
        $this->title['min']='浏览记录';
        $this->assign('title',$this->title);
        $this->display('member-record-browse');
    }
    public function memberRD(){
        //下载记录
        $this->title['min']='下载记录';
        $this->assign('title',$this->title);
        $this->display('member-record-download');
    }
    public function memberRS(){
        //分享记录
        $this->title['min']='分享记录';
        $this->assign('title',$this->title);
        $this->display('member-record-share');
    }
}