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
       \app\admin\model\Manager::update(['last_login_time'=>time(), 'id'=>$info['id']]);
        $this->success("登录成功",url("admin/index/index"));
    }



    public function logout()
    {
        session('UserInfo', null);
        $this->success('您已安全退出', url('admin/login/index'));
    }

}
