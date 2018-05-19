<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController{
    //个人信息管理
    public function commentManage(){
        $this->display('admin_comment_manage');
    }
    //admin的评论
    public function adminCmt(){
        $model=M('Comment');
        $name= session('admin_name');
        $data=$model->field('a.*,b.title')->alias('a')->join('left join ph_post b on a.post_id=b.post_id')->where("cmt_user='$name'")->select();
        $this->assign('data',$data);
        $this->display('admin_comment_admin');
    }
    //toadmin的评论
    public function ToadminCmt(){
        $model=M('Comment');
        $name= session('admin_name');
        $data=$model->field('a.*,b.title')->alias('a')->join('left join ph_post b on a.post_id=b.post_id')->where("b.author='$name'")->select();
        $this->assign('data',$data);
        $this->display('admin_comment_toadmin');
    }
    //user的评论
    public function userCmt(){
        $model=M('Comment');
        $name= session('admin_name');
        $data=$model->field('a.*,b.title')->alias('a')->join('left join ph_post b on a.post_id=b.post_id')->where("cmt_user<>'$name'")->select();
        $this->assign('data',$data);
        $this->display('admin_comment_user');
    }
    //删除评论
    public function del(){
        if(!M('Comment')->delete($_GET['id'])){
             $this->error("发生未知原因，删除失败！！！");
        }
        $this->redirect('Comment/adminCmt',0);
    }   
}
