<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class BaseController extends Controller
{
   public function __construct(Request $request)
   {
       parent::__construct($request);
       $this->commom_assign();
   }

   public  function commom_assign()
   {
       //顶端显示
       $articleTopShow = \app\home\model\Article::alias('a')
           ->where('top','=',1)->field('a.id, a.title, a.content')->limit(3)->select();
       $categoryInfo = \app\home\model\Category2::getList();

       $linksList = \app\home\model\Links::limit(6)->order('id desc')->select();

       $info = [
           'linksList' => $linksList,
           'topShow' => $articleTopShow,
           'categoryInfo' => $categoryInfo,
       ];
       $this->assign($info);
   }
}
