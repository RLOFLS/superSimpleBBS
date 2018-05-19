<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Model;
use Think\Model;
class UserModel extends Model{
    public  $errorMsg="";//用于记录错误信息
    //注册验证
    public function checkMsg($post){
        if(empty($post['user_name'])||empty($post['user_pwd'])||empty($post['sex'])||empty($post['address'])||empty($post['email'])){
           $this->errorMsg="信息填写不完整，注册失败";
           return FALSE;
        } else {
            $str="user_name='{$post['user_name']}'";
            $res=$this->where($str)->find();
            if($res){
                $this->errorMsg="用户名重复请重新注册";
                return FALSE;
            }
         }
        //写入数据
        $post['user_pwd']=md5($post['user_pwd']);
        if($this->add($post)){
            return true;
        } else {
            $this->errorMsg="发生未知原因，注册失败";
            return false;
        }
        
    }
    
    //上传头像
    public function saveData($post,$file){
        $str="user_name='{$post['user_name']}'";
        $res=$this->where($str)->find();
        if($res){
            $this->errorMsg="用户名重复请重新";
            return FALSE;
         }
         
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
           if(!$info) { //// 上传错误提示错误信息 上传失败
                //$this->error($upload->getError());
                $this->errorMsg= $upload->getError();
                
                return FALSE; 
            }else{// 上传成功
            
                //$this->success('上传成功！');
               $post['header_img']=$info['savepath'].$info['savename'];
           }
           //更新数据
           $old_name= session('user_name');
           M('Post')->where("author='$old_name'")->setField('author',$post['user_name']);
           session('user_name',$post['user_name']);
           return $this->save($post);
        }
    }
    //修改密码 验证密码
    public function checkPwd($post){
        $pwd=$this->field('user_pwd')->find($post['user_id']);
        //比较原密码
       if(!(md5($post['old_pwd'])==$pwd['user_pwd'])){
           return FALSE;
       }elseif (empty ($post['user_pwd'])) {
            return FALSE;
        } else {
            //更新密码
            unset($post['old_pwd']);
            $post['user_pwd']= md5($post['user_pwd']);
            return $this->save($post);
        }
    }
}
