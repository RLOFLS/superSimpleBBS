<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    //展示登入页面
    public function login(){
        $this->display('admin_login');
    }
    //验证码类
    public function captcha(){
        //配置
        $cfg=array(
            'fontSize' => 12,
            'useCurve'  => false,//是否用曲线
            'useNoise'  => FALSE,//是否用噪点
            'length'   => 4,//验证码位数
            'fontttf'  => '4.ttf' //验证码字体
        );
        //实例化类
        $verify=new \Think\Verify($cfg);
        //输出
        $verify->entry();
    }
    //验证登入
    public function checkLogin(){
        $post=I('post.');
        //验证验证码
        $verify=new \Think\Verify();
        $result=$verify->check($post['captcha']);
        //判断验证码是否正确
        if($result) {
            $Model=M('Admin');
            //继续验证密码和账号
            $post['admin_pwd']= md5($post['admin_pwd']);
            unset($post['captcha']);
            $data=$Model->where($post)->find();
            //判断用户是否存在
            if($data){
                session('admin_id',$data['admin_id']);
                session('admin_name',$data['admin_name']);
                session('header_img',$data['header_img']);
                //echo session('header_img');die;
                //登入成功更新时间ip
                $update['admin_id']=$data['admin_id'];
                $update['last_time']= time();
                $update['last_ip']= getenv('REMOTE_ADDR');
                $Model->save($update);
                //增加积分
                $d=$data['admin_id'];
                M('Admin')->where("admin_id=$d")->setInc('grade',5);
                //跳转
                $this->success('登入成功！！！',U('Index/index'),3);
            }else{
                $this->error('用户名或者密码错误！！！'); 
            }
        }else {
            $this->error('验证码错误！！！');
        } 
    }
    //退出
    public function logout(){
        //清除session
        session(null);
        $this->success('退出成功',U('Public/login'),3);
    }
}
