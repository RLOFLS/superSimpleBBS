<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;
use Think\Controller;
class InfoController extends CommonController {
    //用户个人首页
    public function infoManage(){
        $this->display('user_info_manage');
    }
     //修改个人信息
    public function update(){
        //是否确认修改
        if(IS_POST){
            $post=I('post.');
            $model=D('User');
            //dump($_FILES['header_img']);die;
            $result=$model->saveData($post,$_FILES['header_img']);
            if($result){
                $this->success('修改成功');
            } else {
                $this->error($model->errorMsg);
            }
        } else {
            //展示个人信息
            $model=M('User');
            $str='user_id='.session('user_id');
            $data=$model->where($str)->find();
            //分配变量
            $this->assign('data',$data);
            $this->display('user_info_update');
        } 
    }
    //修改密码
    public function update_pwd(){
        if(IS_POST){
            //修改密码
            $post=I('post.');
            $model=D('User');
            $result=$model->checkPwd($post);
            if($result){
                $this->success('修改成功');
            } else {
                $this->error('原密码错误或填写不规范,修改失败');
            }
        } else {
            $this->display('user_pwd_update');
        }
        
    }
}
