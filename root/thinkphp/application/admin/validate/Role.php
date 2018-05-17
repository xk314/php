<?php
/**
 * Created by PhpStorm.
 * User: xk
 * Date: 2018/5/13
 * Time: 21:12
 */
namespace app\admin\validate;
use \app\admin\validate\Base;
class Role extends Base
{
    protected $rule = [
        'role_name' =>'require|max:30|unique:tpshop_role',
        'role_auth_ids'=>'require',
    ];

    protected $message = [
        'role_name.require' => '角色名必填',
        'role_name.max' => '角色名长度限制为30',
        'role_name.unique' => '角色名重名',
        'role_auth_ids.require'=>'权限必须进行配置',
    ];
    protected $scene = [
        'create' => ['role_name','role_auth_ids'],
        'update' => ['role_name'=>'require','role_auth_ids'],
    ];
}