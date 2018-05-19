<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
    //后台首页
    public function index(){
        $this->display('admin_index');
    }
    //后台首页home
    public function home(){
        //展示个人信息
        $model=M('Admin');
        $str='admin_id='.session('admin_id');
        $data=$model->where($str)->find();
        //分配变量
        $this->assign('data',$data);
        $this->display('admin_home');
    }
}


