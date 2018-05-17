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
        $authList = \app\admin\model\Auth::field('id,auth_name,auth_c,auth_a')->select();
        $authList= array_map(function($value){return $value->toArray();},$authList);
        foreach($authList as &$v){
            $v['auth'] = $v['auth_c'] ."/".$v['auth_a'];
        }
        $info = [
            'authList' =>$authList,
        ];
        return view('create', $info);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = validate('\app\admin\validate\Role');
        if(!$validate->scene('create')->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/role/create'));
        }
        $data = input();
        $data['role_auth_ids'] = implode(',',$data['role_auth_ids']);
        $res = \app\admin\model\Role::create($data,true);
        if(empty($res))
            $this->error('新增角色类型失败',url('admin/role/index'));
        $this->success('新增角色类型成功', url('admin/role/index'));
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
        $roleInfo = \app\admin\model\Role::find($id)->toArray();
        $roleInfo['auth'] = explode(',',$roleInfo['role_auth_ids']);

        $authList = \app\admin\model\Auth::field('id,auth_name,auth_c,auth_a')->select();
        $authList= array_map(function($value){return $value->toArray();},$authList);
        foreach($authList as &$v){
            $v['auth'] = $v['auth_c'] ."/".$v['auth_a'];
        }
        $info = [
            'roleInfo' => $roleInfo,
            'authList' => $authList,
        ];
        return view('edit', $info);
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
        $validate = validate('\app\admin\validate\Role');
        if(!$validate->scene('update')->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/role/edit',['id'=>$id]));
        }
        $data = input();
        $data['role_auth_ids'] = implode(',', $data['role_auth_ids']);
        $res = \app\admin\model\Role::update($data,$id,true);
        if(empty($res))
            $this->error('修改角色信息失败',url('admin/role/index'));
        $this->success('修改角色信息成功', url('admin/role/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Role::find($id)->delete();
        $this->success('删除角色类型成功',url('admin/role/index'));
    }
}
