<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //展示公告
        $notice=M('Notice')->order('sort')->limit(1)->find();
        $this->assign('notice',$notice);
        //展示板块
        $moudle=M('Moudle')->order('sort')->select();
        $this->assign('moudle',$moudle);
        //show  hot post 
        $hot_post=M('Post')->field('post_id,title,author')->where("is_hot='1' and is_del='0'")->order('time desc')->limit(7)->select();
        $this->assign('hot_post',$hot_post);
        //show good post
         $good_post=M('Post')->field('post_id,title,author')->where("is_good='1' and is_del='0'")->order('time desc')->limit(7)->select();
        $this->assign('good_post',$good_post);
        $this->display();
    }
}