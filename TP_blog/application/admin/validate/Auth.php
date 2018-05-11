<?php
/**
 * Created by PhpStorm.
 * User: xk
 * Date: 2018/5/10
 * Time: 17:32
 */
namespace app\admin\validate;
use \app\admin\validate\Base;
class Auth extends Base
{
    protected $rule = [
        'pid' =>'require',
        'auth_name' =>'require|max:20',
        'auth_c' =>'require',
        'auth_a' =>'require',
        'is_nav' =>'require',
    ];

    protected $message = [
        'pid.require' => '权限父ID必填',
        'auth_name.require' => '权限名称必填',
        'auth_name.max' =>'权限名长度限制为20',
        'auth_c.require' =>'控制器名必填',
        'auth_a.require' =>'方法名必填',
        'is_nav.require' =>'是非列表栏显示必填',
    ];
    protected $scene = [
        'create' => [],
    ];
}