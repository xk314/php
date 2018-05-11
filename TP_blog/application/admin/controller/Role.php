<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Role extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $roleList =\app\admin\model\Role::select();
        $info = [
            'roleList' => $roleList,
        ];
        return view('index', $info);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $roleInfo = \app\admin\model\Role::find($id)->toArray();//保存该角色的信息
        $atuhInfoList = \app\admin\model\Auth::field('id, auth_name, auth_c, auth_a')->select();
        $atuhInfoList = array_map(function($value){return $value->toArray();},$atuhInfoList);
        $authInfo = [];
        foreach($atuhInfoList as $value){
            $authInfo[$value['id']][] = $value;
        }
        $roleAuth = explode(',',$roleInfo['role_auth_ids']);
        $roleAuthArr = [];  //保存该角色拥有的所有的权限信息
        foreach($roleAuth as $v){
            $roleAuthArr[$v] = $authInfo[$v];
        }
        $info = [
            'roleAuthArr' =>$roleAuthArr,
            'roleInfo' =>$roleInfo,
        ];
        return view('read', $info);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
