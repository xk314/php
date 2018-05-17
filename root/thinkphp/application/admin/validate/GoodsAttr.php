<?php
/**
 * Created by PhpStorm.
 * User: xk
 * Date: 2018/5/10
 * Time: 17:32
 */
namespace app\admin\validate;
use \app\admin\validate\Base;
class GoodsAttr extends Base
{
    protected $rule = [
        'attr_name' =>'require|max:30',
        'type_id' =>'require',
        'attr_type' =>'require',
        'attr_input_type' =>'require',
        'attr_values' =>'require|max:200',
    ];

    protected $message = [
        'attr_name.require' => '商品属性名必填',
        'attr_name.max' => '商品属性长度限制为30',
        'type_id.require' =>'商品类型ID必填',
        'attr_type.require' =>'属性类型必填',
        'attr_input_type.require' =>'属性录入方式必填',
        'attr_values.require' =>'属性取值范围必填',
        'attr_values.max' =>'属性取值范围超过限制值200',
    ];
    protected $scene = [
        'create' => ['attr_name', 'type_id','attr_type','attr_input_type','attr_value'],
    ];
}