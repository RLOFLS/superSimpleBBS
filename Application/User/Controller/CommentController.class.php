<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;
use Think\Controller;
class CommentController extends CommonController {
    //用户个人首页
    public function commentManage(){
        $this->display('user_comment_manage');
    }  
    //wode评论
    public function myCmt(){
        $model=M('Comment');
        $name= session('user_name');
        $data=$model->field('a.*,b.title')->alias('a')->join('left join ph_post b on a.post_id=b.post_id')->where("cmt_user='$name'")->select();
        $this->assign('data',$data);
        $this->display('user_comment_my');
    }
    //for me 评论
    public function otherCmt(){
        $model=M('Comment');
        $name= session('user_name');
        $data=$model->field('a.*,b.title')->alias('a')->join('left join ph_post b on a.post_id=b.post_id')->where("b.author='$name'")->select();
        $this->assign('data',$data);
        $this->display('user_comment_other');
    }
    //删除评论
    public function del(){
        if(!M('Comment')->delete($_GET['id'])){
             $this->error("发生未知原因，删除失败！！！");
        }
        $this->redirect('Comment/myCmt',0);
    } 
}
