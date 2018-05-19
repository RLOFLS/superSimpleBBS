<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class MoudleController extends CommonController{
    //后台模块管理
    public function moudleManage(){
        $this->display('admin_moudle_manage');
    }
    //显示所有模块
    public function showAll(){
        $model=M('Moudle');
        $data=$model->order('sort')->select();
        //传递数据
        $this->assign('data',$data);
        $this->display('admin_moudle_all');
    }
    //修改模块
    public function update(){
        if(IS_POST){
            //处理数据
            $post=I('post.');
            if(empty($post['title'])&&empty($post['sort'])&&empty($post['description'])){
                $this->error('填写不完整，修改失败！！！');
            }elseif (!is_numeric ($post['sort'])) {
                $this->error('板块排序请填写整数！！！');
            }
            $model=M('Moudle');
            $result=$model->save($post);
            if($result){
                $this->success('修改成功！！！',U('showAll'),3);
            } else {
                $this->error('未知原因，修改失败！！！'); 
            }
        } else {
            $id=$_GET['id'];
            $model=M('Moudle');
            $data=$model->find($id);
            $this->assign('data',$data);
            $this->display('admin_moudle_update');
        }
        
    }
    //添加模块
    public function add(){
        //看是否提交表单
        if(IS_POST){
            //处理数据
            $post=I('post.');
            if(empty($post['title'])&&empty($post['sort'])&&empty($post['description'])){
                $this->error('填写不完整，添加失败！！！');
            }elseif (!is_numeric ($post['sort'])) {
                $this->error('板块排序请填写整数！！！');
            }
            $model=M('Moudle');
            $result=$model->add($post);
            if($result){
                $this->success('添加成功！！！',U('showAll'),3);
            } else {
                $this->error('未知原因，添加失败！！！'); 
            }
        } else {
             $this->display('admin_moudle_add');
        }
        
    }
    //删除板块
    public function del(){
        M('Moudle')->delete($_GET['m_id'])?$this->redirect('Moudle/showAll',0):$this->error('发生未知原因，删除失败！！！');
 
    }
    
}
