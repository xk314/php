<?php
namespace app\admin\controller;
use \think\Controller;
class Index extends Controller
{
    public function index()
    {
        $this->view->engine->layout(false);
        return view('index');
    }
}
