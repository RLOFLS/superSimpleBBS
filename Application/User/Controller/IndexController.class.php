<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //用户个人首页
    public function index(){
        $this->display('user_index');
    }
    public function home(){
        //展示个人信息
        $model=M('User');
        $str='user_id='.session('user_id');
        $data=$model->where($str)->find();
        //分配变量
        $this->assign('data',$data);
        $this->display('user_home');
    }
}