<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function index(){
        //同时点击板块加scan1
        $id=$_GET['id'];
        M('Moudle')->where("moudle_id=$id")->setInc('scan',1);
        $postInfo=M('Post')->field('post_id,author,title,time,scan,comments,is_top,is_hot,is_good')->where("moudle_id=$id and is_del='0'")->order('time desc')->select();
        $this->assign('postInfo',$postInfo);
        $this->showM();
        //帖子信息
        $this->display();
    }
    //show model
    private function showM(){
        //展示板块
        $moudle=M('Moudle')->order('sort')->select();
        $this->assign('moudle',$moudle);
    }
    //show moudle post
    public function showMpost(){
        $id=$_GET['id'];
        if($id=='all'){
            $postInfo=M('Post')->field('post_id,author,title,time,scan,comments,is_top,is_hot,is_good')->where("is_del='0'")->order('time desc')->select(); 
        }elseif ($id=='good') {
            $postInfo=M('Post')->field('post_id,author,title,time,scan,comments,is_top,is_hot,is_good')->where("is_good='1' and is_del='0'")->order('time desc')->select(); 
        }elseif ($id=='hot') {
            $postInfo=M('Post')->field('post_id,author,title,time,scan,comments,is_top,is_hot,is_good')->where("is_hot='1' and is_del='0'")->order('time desc')->select();    
        } else {
             $postInfo=M('Post')->field('post_id,author,title,time,scan,comments,is_top,is_hot,is_good')->where("moudle_id=$id and is_del='0'")->order('time desc')->select(); 
        }
        $this->assign('postInfo',$postInfo);
        $this->showM();
        $this->display('index');
    }
    //显示个人帖信息
    public function showPost(){
        $id=$_GET['id'];
        $author=$_GET['author'];
        //comment +1
        M('post')->where("post_id=$id")->setInc('scan',1);
        //post information
        $postInfo=M('Post')->field("post_id,title,author,content,time,scan,comments")->where("post_id=$id")->find();
        $this->assign('postInfo',$postInfo);
        //author information  
        
        if($author=='admin'){
            $authorInfo=M('Admin')->field('admin_id,header_img,admin_name,post_nums,grade')->where("admin_name='$author'")->find();
        } else {
            $authorInfo=M('User')->field('user_id,header_img,user_name,post_nums,grade')->where("user_name='$author'")->find();
          
        }
        $this->assign('authorInfo',$authorInfo);
        //show comments;
        $cmtInfo=M('comment')->field('a.*,b.user_id,b.header_img,b.post_nums,b.grade')->alias('a')
                ->join('left join ph_user b on a.cmt_user=b.user_name')->where("a.post_id=$id")->select();
        $this->assign('cmtInfo',$cmtInfo);
        //评论人信息
        $this->display('post');
    }
    //显示个人信息
    public function showInfo(){
        $id=$_GET['id'];
        $data=M('User')->where("user_id=$id")->find();
        $this->assign('data',$data);
        $author=$data['user_name'];
        $post=M('Post')->field('post_id,time,title,author')->where("author='$author'")->order('time desc')->limit(10)->select();
        $this->assign('post',$post);
        $this->display('user_info');
    }
    //show post message
    //评论
    public function comment(){
        if(IS_POST){
            $post=I('post.');
            if(session('user_id')){
                if(empty($post['content'])){
                    $this->error('请先填写内容！！！');
                } else {
                    //登入了就补全字段
                    $post['post_id']=$_GET['id'];
                    $post['time']=time();
                    $post['cmt_user']= session('user_name');
                    M('Comment')->add($post);
                    //tong是增加积分
                    $uid= session('user_id');
                    M('User')->where("user_id=$uid")->setInc('grade',2);
                    $this->success("评论成功！！！！");
                } 
            } else {
                $this->error('请先登入再评论!!!');
            }
        }
        
    }
}
