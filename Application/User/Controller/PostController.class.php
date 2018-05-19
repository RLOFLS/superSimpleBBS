<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;
use Think\Controller;
class PostController extends CommonController {
    //用户个人首页
    public function postManage(){
        $this->display('user_post_manage');
    }  
    //显示所有帖子
    public function showAll(){
        $model=M('Post');
        $author=session('user_name');
        $data=$model->where("author='$author' and is_del='0'")->select();
        $this->assign('data',$data);
        $this->display('user_post_all');
    }
    //fa帖子
    public function send(){
        if(IS_POST){
            $post=I('post.');
            if(empty($post['title'])&&empty('content')){
                $this->error('信息填写信息不完整，发帖失败！！！');
            }
            $post['author']= session('user_name');
           // dump($post);die;
            $post['time']= time();
            //保存数据
            $model=M('Post');
            //$str='moudle_id='.$post['moudle_id'];
            //$model2=D('Moudle');
            //$into=$model2->addOne($post['moudle_id']);
            //相应的板块加 1
            $res=M('Moudle')->where('moudle_id='.$post['moudle_id'])->setInc('post_nums',1);
            $result=$model->data($post)->add();
            if($result&&$res){
                $id= session('user_id');
                M('User')->where("user_id=$id")->setInc('post_nums',1);
                M('User')->where("user_id=$id")->setInc('grade',3);
                $this->success('发帖成功',U('showAll'),3);
            } else {
                $this->error('发生未知原因，发帖失败！！！');
            }
        } else {
            $model=M('Moudle');
            $data=$model->field('moudle_id,title')->select();
            $this->assign('data',$data);
            $this->display('user_post_send');
        }
    }
    //显示所有帖子
    public function recycle(){
        $model=M('Post');
        $author= session('user_name');
        $data=$model->where("is_del='1'and author='$author'")->select();
        $this->assign('data',$data);        
        $this->display('user_post_recycle');
    }
    //删除帖子
    public function del(){
        $post_id=$_GET['id'];
        if(empty($_GET['ud'])){
            if(!M('Post')->where("post_id=$post_id")->setField('is_del','1')){
             $this->error("发生未知原因，删除失败！！！");
            } else {
                $this->redirect('Post/showAll',0);
            }
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
}
