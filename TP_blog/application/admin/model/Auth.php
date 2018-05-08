<?php

namespace app\admin\model;

use think\Model;

class Auth extends Model
{
    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
    public function getUpdateTimeAttr($value)
    {
        return date("Y-m-d H:i",$value);
    }
    public function getIsNavAttr($value)
    {
        return $value==1? '是' : '否';
    }
}
