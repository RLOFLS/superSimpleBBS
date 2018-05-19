<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class PostController extends CommonController{
    //个人信息管理
    public function postManage(){
        $this->display('admin_post_manage');
    }
    //显示所有的帖子
    public function showAdmin(){
        $model=M('Post');
        $author=session('admin_name');
        $data=$model->where("author='$author' and is_del='0'")->select();
        $this->assign('data',$data);        
        $this->display('admin_post_admin');
    }
    //显示用户的帖子
    public function showUser(){
        $model=M('Post');
        $author=session('admin_name');
        $data=$model->where("author<>'$author' and is_del='0'")->select();
        $this->assign('data',$data);        
        $this->display('admin_post_user');
    }
    //fa帖子
    public function sendPost(){
        if(IS_POST){
            $post=I('post.');
            if(empty($post['title'])&&empty('content')){
                $this->error('信息填写信息不完整，发帖失败！！！');
            }
            $post['author']= session('admin_name');
            $post['time']= time();
            $post['is_top']=1;
            //保存数据
            $model=M('Post');
            //$str='moudle_id='.$post['moudle_id'];
            //$model2=D('Moudle');
            //$into=$model2->addOne($post['moudle_id']);
            //相应的板块加 1
            $res=M('Moudle')->where('moudle_id='.$post['moudle_id'])->setInc('post_nums',1);
            $result=$model->data($post)->add();
            if($result&&$res){
                $id= session('admin_id');
                M('Admin')->where("admin_id=$id")->setInc('post_nums',1);
                M('Admin')->where("admin_id=$id")->setInc('grade',3);
                $this->success('发帖成功',U('showAdmin'),3);
            } else {
                $this->error('发生未知原因，发帖失败！！！');
            }
        } else {
            $model=M('Moudle');
            $data=$model->field('moudle_id,title')->select();
            $this->assign('data',$data);
            $this->display('admin_post_send');
        }
    }
    //回收站
    public function recycle(){
        $model=M('Post');
        $data=$model->where("is_del='1'")->select();
        $this->assign('data',$data);        
        $this->display('admin_post_recycle');
    }
    //删除帖子
    public function del(){
        $post_id=$_GET['id'];
        //dump($_GET['a']);die;
        if(empty ($_GET['ad'])){
           // $this->success('删除成功',U('showAdmin'));
           if(!M('Post')->where("post_id=$post_id")->setField('is_del','1')){
                $this->error("发生未知原因，删除失败！！！");
            }
           $this->redirect('Post/showAdmin',0);
        } elseif($_GET['ad']==1) {
            if(!M('Post')->where("post_id=$post_id")->setField('is_del','1')){
                $this->error("发生未知原因，删除失败！！！");
            }
            $this->redirect('Post/showUser',0);
        } else {
            M('Post')->delete($post_id);
            $this->redirect('Post/recycle',0);
        }
    }
    //回收站恢复帖子
    public function recover(){
        $id=$_GET['id'];
        if(M('Post')->where("post_id=$id")->setField('is_del','0')){
            $this->redirect('Post/recycle',0);
        } else {
            $this->error('出现未知错误，恢复失败！！！！');
        }
    }
    //处理是否加精
    public function handleGood(){
        $post_id=$_GET['id'];
        $status=M('Post')->field('is_good')->where("post_id=$post_id")->find();
        if($status['is_good']){
            M('Post')->where("post_id=$post_id")->setField('is_good',0);
        } else {
            M('Post')->where("post_id=$post_id")->setField('is_good',1);
        }
        $this->redirect('Post/showUser',0);
    }
    //处理是否加热
    public function handleHot(){
        $post_id=$_GET['id'];
        $status=M('Post')->field('is_hot')->where("post_id=$post_id")->find();
        if($status['is_hot']){
            M('Post')->where("post_id=$post_id")->setField('is_hot',0);
        } else {
            M('Post')->where("post_id=$post_id")->setField('is_hot',1);
        }
        $this->redirect('Post/showUser',0);
    }
}
