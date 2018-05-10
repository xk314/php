<?php

namespace app\admin\model;

use think\Model;

class Auth extends Model
{
//    设置自动完成
    protected $insert = ['create_time'];
    protected $update = ['update_time'];

//    获取器
    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
    public function getUpdateTimeAttr($value)
    {
        if(empty($value)) return '未修改';
        return date("Y-m-d H:i",$value);
    }
    public function getIsNavAttr($value)
    {
        return $value==1? '是' : '否';
    }
//自动完成
    public function setCreateTimeAttr()
    {
        return time();
    }
    public function setupdateTimeAttr()
    {
        return time();
    }
}
