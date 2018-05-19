<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends CommonController{
    //公告管理
    public function noticeManage(){
        $this->display('admin_notice_manage');
    }
    //显示所有公告
    public function showAll(){
        $data=M('Notice')->select();
        $this->assign('data',$data);
        $this->display('admin_notice_all');
    }
    //修改公告
    public function update(){
        if(IS_POST){
            //处理数据
            $post=I('post.');
            if(!(empty($post['title'])&&empty($post['sort'])&&empty($post['content']))){
                $this->error('填写信息不完整，修改失败！！');
            } elseif(!is_numeric($post['sort'])){
                $this->error('排序要为整数，修改失败！！');
            } else {
                //补全字段
                $post['time']= time();
                $model=M('Notice');
                $res=$model->save($post);
                $res ? $this->success('修改成功！！！',U('showAll')) : $this->error('未知原因，修改失败！！');
            }    
        } else {
            $id=$_GET['n_id'];
            $model=M('Notice');
            $data=$model->find($id);
            $this->assign('data',$data);
            //$this->display('admin_notice_update');
        }
        $this->display('admin_notice_update');
    }
    //添加公告
    public function add(){
        if(IS_POST){
            $post=I('post.');
            if(empty($post['title'])&&empty($post['sort'])&&empty($post['content'])){
                $this->error('填写信息不完整，添加失败！！');
            } elseif(!is_numeric($post['sort'])){
                $this->error('排序要为整数，添加失败！！');
            } else {
                //补全字段
                $post['time']= time();
                $model=M('Notice');
                $res=$model->add($post);
                $res ? $this->success('添加成功！！！',U('showAll')) : $this->error('未知原因，添加失败！！');
            }    
            } else {
            $this->display('admin_notice_add');
        }
    }
    //删除公告
    public function del(){
        M('Notice')->delete($_GET['n_id'])?$this->redirect('Notice/showAll',0):$this->error('发生未知原因，删除失败！！！');
  
    }
}
