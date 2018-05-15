<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Auth extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $authList = \app\admin\model\Auth::select();
        $authList = getTree($authList);
        $info = [
            'authList' => $authList,
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
        $authArr = \app\admin\model\Auth::field('id,auth_name')->select();
        $info = [
            'authArr' =>$authArr,
        ];
        return view('create',$info);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = validate('\app\admin\validate\Auth');
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/auth/index'));
        }
        $res = \app\admin\model\Auth::where('auth_name',input('auth_name'))->find();
        !empty($res) && $this->error('权限名已存在',url('admin/auth/index'));
        $res = \app\admin\model\Auth::create(input(),true);
        if(empty($res))
            $this->error('新增权限失败',url('admin/auth/index'));
        $this->success('新增权限成功', url('admin/auth/index'));
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        dump($id);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $authInfo = \app\admin\model\Auth::find($id);
        $authArr = \app\admin\model\Auth::select();
        $info = [
            'authInfo' =>$authInfo,
            'authArr' =>$authArr,
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
        $validate = validate('\app\admin\validate\Auth');
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/auth/index'));
        }
        //$res = \app\admin\model\Auth::where('auth_name',input('auth_name'))->find();
       // !empty($res) && $this->error('权限名已存在',url('admin/auth/index'));
        $res = \app\admin\model\Auth::update(input(),$id,true);
        if(empty($res))
            $this->error('修改权限失败',url('admin/auth/index'));
        $this->success('修改权限成功', url('admin/auth/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Auth::find($id)->delete();
        $this->success('删除权限成功',url('admin/auth/index'));
    }
}
