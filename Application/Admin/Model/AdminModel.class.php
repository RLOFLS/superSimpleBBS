<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    //上传头像
    public function saveData($post,$file){
        //定义上传路径
        if($file['error']=='0'){
            //有文件
            $config = array(
                'maxSize'    =>    3145728,
                //'rootPath'   =>    WORKING_PATH.UPLOAD_ROOT_PATH,//保存根路径        
                'rootPath'   =>    './Public/uploads/',//保存根路径
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
                'subName'    =>    array('date','Ymd'),
            );
           $upload =new \Think\Upload($config);// 实例化上传类
           $info= $upload->uploadOne($file); 
           //dump($info);die;
           if(!$info) {// 上传错误提示错误信息 上传失败 
                //$this->error($upload->getError());
                echo $upload->getError();
                die;
                return FALSE;
            }else{// 上传成功
                //$this->success('上传成功！');
               $post['header_img']=$info['savepath'].$info['savename'];
           }
           //更新数据
           return $this->save($post);
        }
    }
    //修改密码 验证密码
    public function checkPwd($post){
        $pwd=$this->field('admin_pwd')->find($post['admin_id']);
        //比较原密码
       if(!(md5($post['old_pwd'])==$pwd['admin_pwd'])){
           return FALSE;
       }elseif (empty ($post['admin_pwd'])) {
            return FALSE;
        } else {
            //更新密码
            unset($post['old_pwd']);
            $post['admin_pwd']= md5($post['admin_pwd']);
            return $this->save($post);
        }
    }
}
