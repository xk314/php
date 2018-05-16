<?php

namespace app\home\model;

use think\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $insert = ['addate'];

    public function setAddateAttr($value)
    {
        return time();
    }
}
