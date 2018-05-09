<?php

namespace app\admin\model;

use think\Model;

class Goods extends Model
{
    protected $table = 'tpshop_goods';
    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
    public function getUpdateTimeAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
}
