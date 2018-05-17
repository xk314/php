<?php

namespace app\home\controller;

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
        //dump(session('call_back_article_id'));
        $loginInfo = input();
        if(!captcha_check($loginInfo['code'])){
            $this->error("验证码错误", url('home/login/index'));
        }
        $check = [
            'username' => $loginInfo['username'],
            'password' => make_password($loginInfo['password']),
            'status' => 2
        ];
        $info = \app\home\model\Manager::where($check)->find();
        if(empty($info)){
            return json(['msg'=>"登录失败", 'url' =>url("home/login/index")]);
        }
        session('UserInfo',$info);//将登陆用户信息写入session
       \app\home\model\Manager::update(['last_login_time'=>time(), 'id'=>$info['id']]);
        if(session('?call_back_article_id')){
            //登录跳转到相应的文章处
            $id = session('call_back_article_id.id');
            $date = session('call_back_article_id.date');
            if(time()-$date <= 300)
                return json(['msg'=>"登录成功", 'url' =>url("home/article/read",['id'=>$id])]);
        }
        //if(session('?call_back_article_id'))  $this->success("登录成功",url(session('call_back')));
        return json(['msg'=>"登录成功", 'url' =>url("home/index/index")]);
    }



    public function loginout()
    {
        session('UserInfo', null);
        $this->success('您已安全退出', url('home/index/index'));
    }

}
