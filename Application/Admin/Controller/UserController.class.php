<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
    //个人信息管理
    public function userManage(){
        $this->display('admin_user_manage');
    }
    //显示所有信息
    public function showAll(){
        $model=M('User');
        $data=$model->field('user_id,user_name,email,grade,last_time,is_speak')->select();
        $this->assign('data',$data);
        $this->display('admin_user_all');
    }
    //处理用户禁言
    public function handleSpeak(){
        $user_id=$_GET['id'];
        //$status=M('User')->field('is_speak')->where("user_id=$user_id")->find();
        if($_GET['status']){
            M('User')->where("user_id=$user_id")->setField('is_speak',0);
        } else {
            M('User')->where("user_id=$user_id")->setField('is_speak',1);
        }
        $this->redirect('User/showAll',0);
    }
}
