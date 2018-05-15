<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    //通过设置自动完成以及修改器，在新增数据时，自动完成相应字段的插入
    protected $insert = ['addate','user_id'];
    public function setAddateAttr()
    {
        return time();
    }
    public function setUserIdAttr()
    {
        return session('UserInfo')['id'];
        //将session中保存的当前登录用户的信息，利用自动完成机制写入到user_id字段
    }
    public function getAddateAttr($value)
    {
       return date("Y-m-d H:i",$value);
    }
    public function getTopAttr($value)
    {
        $arr = [
            0 => '否',
            1 => '是',
        ];
        return $arr[$value];
    }
    public function setTopAttr($value)
    {
        $arr = [
            '否' => 0,
            '是' => 1,
        ];
        return $arr[$value];
    }
}
