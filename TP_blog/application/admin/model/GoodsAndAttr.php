<?php

namespace app\admin\model;

use think\Model;

class GoodsAndAttr extends Model
{
    protected $table = 'tpshop_goods_attr';

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
