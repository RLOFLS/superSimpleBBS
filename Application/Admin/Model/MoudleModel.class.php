<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Model;
use Think\Model;
class MoudleModel extends Model{
    //板块表post_nums+1
    public function addOne($moudle_id){
        return $this->where('moudle_id='.$moudle_id)->setInc('post_nums',1);
    }
}
