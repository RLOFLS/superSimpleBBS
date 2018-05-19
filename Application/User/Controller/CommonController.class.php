<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;
use Think\Controller;
class CommonController extends Controller {
    //ThinkPHP提供em
    public function _initialize(){
        $id=session('user_id');
        if(empty($id)){
            //echo '你没有登入';die;
            //$this->error('请先登录',U('Public/login'),3);
            //exit;
            //编写javascript
            $url=U('Public/login');
            echo "<script>top.location.href='$url'</script>";exit;
        }
    }
}
