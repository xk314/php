<?php
namespace app\home\controller;

class Index
{
    public function index()
    {
        $articleList = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->order('a.top desc, a.orderby')
            ->paginate(3);
        $articleTopShow = \app\home\model\Article::alias('a')
            ->where('top','=',1)->field('a.id, a.title, a.content')->limit(3)->select();
        $categoryInfo = \app\home\model\Category2::getList();
        $pageInfo = $articleList->toArray();
        $info = [
            'articleList' =>$articleList,
            'current_page' =>$pageInfo['current_page'],
            'last_page' =>$pageInfo['last_page'],
            'topShow' => $articleTopShow,
            'categoryInfo' =>$categoryInfo,
        ];
        return view('index', $info);
    }
}
