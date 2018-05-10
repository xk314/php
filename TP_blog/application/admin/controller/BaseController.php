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
    }
}
