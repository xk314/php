<?php
/**
 * Created by PhpStorm.
 * User: xk
 * Date: 2018/5/10
 * Time: 22:17
 */
namespace app\admin\validate;
use \app\admin\validate\Base;
class Goods extends Base
{
    protected $rule = [
        'goods_name' =>'require|max:30',
        'goods_price'=>'require|number|gt:0',
        'goods_number' =>'require|integer|gt:0',
        'goods_introduce' =>'require|max:300',
        'goods_logo' =>'require',
        'type_id' =>'require',
    ];

    protected $message = [
        'goods_name.require' => '商品名必填',
        'goods_name.max' => '商品名长度限制为30',
        'goods_price.require' =>'商品价格必填',
        'goods_price.number' =>'商品价格需为数字',
        'goods_price.gt' =>'商品价格必须大于零',
        'goods_number.require' =>'商品数量必填',
        'goods_number.integer' =>'商品数量需为整数',
        'goods_number.gt' =>'商品数量必须大于零',
        'goods_introduce.require' =>'商品简介必填',
        'goods_introduce.max' =>'商品简介长度限制为300',
        'goods_logo' =>'商品Logo需要上传',
        'type_id.require' =>'商品类型必填',
    ];
    protected $scene = [
        'create' => ['type_id','goods_name', 'goods_price','goods_number','goods_introduce','goods_logo'],
    ];
}