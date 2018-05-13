<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Manager extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $managerList = \app\admin\model\Manager::alias('m')->field('m.*')
            ->join('tpshop_role role','m.role_id=role.id','left')->field('role.role_name')
            ->select();
        $info = [
            'managerList' =>$managerList,
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
        $roleList = \app\admin\model\Role::field('id, role_name')->select();
        $roleList = array_map(function($value){return $value->toArray();}, $roleList);
        $info = [
            'roleList' =>$roleList,
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
        $validate = validate('\app\admin\validate\Manager');
        if(!$validate->scene('create')->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/manager/create'));
        }
        $date = input();
        $date['password'] = make_password($date['password']);
        $res = \app\admin\model\Manager::create($date,true);
        if(empty($res))
            $this->error('新增用户失败',url('admin/manager/index'));
        $this->success('新增用户成功', url('admin/manager/index'));
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $userInfo =\app\admin\model\Manager::alias('m')
                    ->field('m.*')->join('tpshop_role role','m.role_id=role.id')->field('role.role_name')
                    ->find($id)->toArray();

        //将所有所有的权限信息处理为索引为权限ID的数组
        $authList = \app\admin\model\Auth::field('id,auth_name')->select(); //所有权限信息
        $authList = array_map(function($value){return $value->toArray();},$authList);
        $authArrById = [];  //将所有的权限信息以权限ID为下标放入数组
        foreach($authList as $v){
            $authArrById[$v['id']] = $v;
        }
        //获取当前用户对应的角色类型拥有的权利
        $userAuthIds = \app\admin\model\Role::where('id',$userInfo['role_id'])
            ->field('role_auth_ids')->find()->toArray();
        $userAuthIds['role_auth_ids'] = explode(',',$userAuthIds['role_auth_ids']);//用户所有权限的ID
        //将用户拥有的权限，放入用户信息数组下标为auth处，数据为二维数组，下标为权限的ID
        foreach($userAuthIds['role_auth_ids'] as $id){
            $userInfo['auth'][$id] = $authArrById[$id];
        }
        $info = [
            'userInfo'=>$userInfo,
        ];
        return view('read',$info);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $userInfo = \app\admin\model\Manager::find($id)->toArray();
        $roleList = \app\admin\model\Role::select();
        $info = [
            'userInfo'=>$userInfo,
            'roleList' =>$roleList,
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
        $validate = validate('\app\admin\validate\Manager');
        if(!$validate->scene('edit_status')->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/manager/edit',['id'=>$id]));
        }
        $res = \app\admin\model\Manager::update(input(),$id,true);
        if(empty($res))
            $this->error('修改用户状态失败',url('admin/manager/index'));
        $this->success('修改用户状态成功', url('admin/manager/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Manager::find($id)->delete();
        $this->success('删除用户成功', url('admin/manager/index'));
    }
}
