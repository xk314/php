<?php

namespace app\admin\model;

use think\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected  $insert = ['addate'];
    public function getAddateAttr($value)
    {
        return date("Y-m-d",$value);
    }
    public function setAddateAttr($value)
    {
        return time();
    }
}
