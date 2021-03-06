<?php
/**
 * Created by PhpStorm.
 * User: xk
 * Date: 2018/5/13
 * Time: 13:55
 */

namespace app\admin\validate;
use \app\admin\validate\Base;
class Manager extends Base
{
    protected $rule = [
        'username' =>'require|max:30|unique:tpshop_manager',
        'password'=>'require|length:6,8',
        'confirm' =>'require|confirm:password',
        'email' =>'require|email',
        'nickname' =>'unique:tpshop_manager',
        'role_id' =>'require',
    ];

    protected $message = [
        'username.require' => '用户名必填',
        'username.max' => '用户名长度限制为30',
        'username.unique' =>'用户名已被使用',
        'password.require' =>'密码必填',
        'password.length' =>'密码长度必须为6-8位',
        'confirm.require' =>'请确认密码',
        'confirm.confirm' =>'密码不一致',
        'email.require' =>'邮箱名必填',
        'email.email' =>'邮箱格式错误',
        'nickname.unique' =>'昵称重复',
        'role_id.require' =>'用户类型必填',
        'status.require'=>'请设置用户状态',
        'role_id.require'=>'请设置用户类型',
    ];
    protected $scene = [  //定义验证场景
        'create' => ['username','password','role_id','status'],
        'edit_status' =>['role_id', 'status'=>'require','role_id'=>'require'],
    ];
}