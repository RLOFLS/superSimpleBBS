<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;
use Think\Controller;
class EmailController extends CommonController {
    //用户个人首页
    public function emailManage(){
        $this->display('user_email_manage');
    }  
    //收件箱
    public function receive(){
        $model=M('Email');
        $name=session('user_name');
        $data=$model->where("to_someone='$name' and is_del='0'")->select();
        $this->assign('data',$data);
        $this->display("user_email_receive");
    }
    //fa件箱
    public function send(){
        $model=M('Email');
        $name=session('user_name');
        $data=$model->where("from_someone='$name' and is_del='0'")->select();
        $this->assign('data',$data);
        $this->display("user_email_send");
    }
    //查看帖子更改状态
    public function look(){
        $id=$_GET['id'];
        if(!$_GET['status']=='1'){
            M('Email')->where("email_id=$id")->setField('status','1');
        } 
        if( $_GET['b']== '1'){
           $this->redirect('Email/receive',0);
         }
         $this->redirect('Email/send',0);
    }
    //删除邮件
    public function del(){
        $id=$_GET['id'];
        if(!empty ($_GET['ed'])){
           // $this->success('删除成功',U('showAdmin'));
           if(!M('Email')->where("email_id=$id")->setField('is_del','1')){
                $this->error("发生未知原因，删除失败！！！");
                return FALSE;
            }
            $_GET['ed']=='1'?$this->redirect('Email/receive',0): $this->redirect('Email/send',0);
          
        } else {
            M('Email')->delete($id);
            $this->redirect('Email/recycle',0);
        }
    }
    //发邮件
    public function toSend(){
        if(IS_POST){
            $post=I('post.');
            if(empty($post['title'])&&empty($post['to_someone'])&&empty($post['from_somesone'])&&empty($post['content'])){
                $this->error('填写信息不完整，发送邮件失败！！');
            } else {
                //补全字段
                $post['time']= time();
                $model=M('Email');
                $res=$model->add($post);
                $res ? $this->success('发邮成功！！！',U('send')) : $this->error('未知原因，发送邮件失败！！');
            }
        } else {
            $this->display("user_email_tosend");
        }
    }
    //回收站
    public function recycle(){
         $model=M('Email');
        $name=session('user_name');
        $data=$model->where("(to_someone='$name' or from_someone='$name') and is_del='1'")->select();
        $this->assign('data',$data);
        $this->display("user_email_recycle");
    }
    //恢复邮件
    public function  recover(){
        $id=$_GET['id'];
        if(!M('Email')->where("email_id=$id")->setField('is_del','0')){
            $this->error('发生未知原因恢复失败！！！！');
        }
        $this->redirect('Email/recycle',0);
    }
}
