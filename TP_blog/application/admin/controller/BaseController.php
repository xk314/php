<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        if(!session('?UserInfo'))
            $this->error('您还未登录，请登录', url('admin/login/index'));

        $this->auth_list();
        parent::__construct($request);
    }

    private  function auth_list()
    {
        $topAuth = \app\admin\model\Auth::where(['pid'=>0, 'is_nav'=>1])->select();
        $map['pid'] = ['<>', 0];
        $map['is_nav'] = ['=',1];
        $secondAuth = \app\admin\model\Auth::where($map)->select();
        $topAuth = array_map(function($value){return $value->toArray();},$topAuth);
        $secondAuth = array_map(function($value){return $value->toArray();},$secondAuth);
        $info = [
            'topAuth' => $topAuth,
            'secondAuth' => $secondAuth,
        ];
        $this->assign($info);
    }
}
