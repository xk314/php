<?php

namespace app\admin\model;

use think\Model;

class Manager extends Model
{
    protected $table = 'tpshop_manager';
    //    设置自动完成
    protected $insert = ['create_time'];
    protected $update = ['update_time'];

    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d",$value);
    }
    public function getUpdateTimeAttr($value)
    {
        if(empty($value)) return '未修改';
        return date("Y-m-d",$value);
    }
    public function getLastLoginTimeAttr($value)
    {
        if(empty($value)) return '暂未登录';
        return date("Y-m-d",$value);
    }

//自动完成
    public function setCreateTimeAttr()
    {
        return time();
    }
    public function setUpdateTimeAttr()
    {
        return time();
    }


    public function getStatusAttr($value)
    {
        $v = ['注销','禁用','正常'];
        return $v[$value];
    }
//自动完成
    public function setStatusAttr($value)
    {
        $arr = ['注销'=>0,'禁用'=>1, '正常'=>2,];
        return $arr[$value];
    }
}
