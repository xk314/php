<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this->view->engine->layout(false);
        return view('login');
    }
    public function login()
    {
        $loginInfo = input();
        if(!captcha_check($loginInfo['code'])){
            $this->error("验证码错误", url('admin/login/index'));
        }
        $check = [
            'username' => $loginInfo['username'],
            'password' => make_password($loginInfo['password']),
            'status' => 2
        ];
        $info = \app\admin\model\Manager::where($check)->find();
        if(empty($info)){
            $this->error("用户名密码错误", url('admin/login/index'));
        }
        session('UserInfo',$info);//将登陆用户信息写入session
       // \app\admin\model\Manager::update(['last_login_time'=>time(),], $info['id']);
        $this->success("登录成功",url("admin/index/index"));
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
        //
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
