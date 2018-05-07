<?php

namespace app\home\model;

use think\Model;

class Article extends Model
{
    protected $insert = ['addate','user_id'];
    public function setAddateAttr()
    {
        return time();
    }
//    public function setUserIdAttr()
//    {
//        return session('userInfo')['id'];
//    }
    public function getAddateAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
}
