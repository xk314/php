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
        parent::__construct($request);
        $this->auth_list();
        $this->auth_control();
    }

    //根据当前用户的权限及权限是否显示在列表栏，来对左侧列表栏的显示进行设置
    private  function auth_list()
    {
        $topAuth = \app\admin\model\Auth::where(['pid'=>0, 'is_nav'=>1])->select();
        $map['pid'] = ['<>', 0];
        $map['is_nav'] = ['=',1];
        $secondAuth = \app\admin\model\Auth::where($map)->select();
        $topAuth = array_map(function($value){return $value->toArray();},$topAuth);
        $secondAuth = array_map(function($value){return $value->toArray();},$secondAuth);

        $nowUserInfo = session('UserInfo')->toArray();
        if($nowUserInfo['role_id']===0){
            $info = \app\admin\model\Auth::field('id')->select();
            foreach($info as $v){
                $nowUserAuth[] = $v['id'];
            }
        }else{
            $nowUserAuth = \app\admin\model\Role::where('id',$nowUserInfo['role_id'])->field("role_auth_ids")->find()->toArray();
            $nowUserAuth = explode(',', $nowUserAuth['role_auth_ids']);
        }
        //dump($nowUserAuth);
        $info = [
            'topAuth' => $topAuth,
            'secondAuth' => $secondAuth,
            'userAuth' => $nowUserAuth,
        ];
        $this->assign($info);
    }

    private function auth_control()
    {
        $nowUserInfo = session('UserInfo')->toArray();
        if($nowUserInfo['role_id'] === 0) return;    //超级管理员不用进行权限的检测
        $controller = request()->controller();
        $action = request()->action();
        if($controller =='Index' && $action=='index') return; //特殊页面不用进行权限检测
        $search = [
            'auth_c' => $controller,
            'auth_a' => $action,
        ];
        //当前操作所需的权限Id,若权限未添加到auth表中，则此处会报错，必须确保所有的操作已经添加到权限表中
        $needAuthId = \app\admin\model\Auth::where($search)->field('id')->find()->toArray()['id'];
        $userAuthIds = \app\admin\model\Role::where('id',$nowUserInfo['role_id'])->field('role_auth_ids')->find()->toArray();
        $userAuthIds = explode(',',$userAuthIds['role_auth_ids']);
        if(in_array($needAuthId, $userAuthIds))
            return;
        else
            $this->error('您没有该操作的权限', url('admin/index/index'));
    }
}
