<?php

namespace app\admin\model;

use think\Model;

class Goodsattr extends Model
{
    protected $table = 'tpshop_attribute';

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


    public function getAttrTypeAttr($value)
    {
        $v = ['唯一属性', '单选属性'];
        return $v[$value];
    }
    public function getAttrInputTypeAttr($value)
    {
        $v = ['单选框', '多选框', '输入框', '下拉列表'];
        return $v[$value];
    }
//自动完成
    public function setAttrTypeAttr($value)
    {
        $arr = ['唯一属性'=>0, '单选属性'=>1];
        return $arr[$value];
    }
    public function setAttrInputTypeAttr($value)
    {
        $arr = ['单选框'=>0, '多选框'=>1, '输入框'=>2, '下拉列表'=>3];
        return $arr[$value];
    }

}
