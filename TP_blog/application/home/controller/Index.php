<?php
namespace app\home\controller;

class Index
{
    public function index()
    {
        $where = ['a.id'=>['>','0']];
        $search = explode(':',input('editbox_search'));
        //首页搜索框
        $categoryId = input('category_id');
        //首页右侧分类栏
        if($categoryId != 0)
            $where ['a.category_id'] =['=',$categoryId];
        if(count($search)>=2)
            $where ['a.title'] =['like',"%$search[1]%"];
        $articleList = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->where($where)
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->order('a.top desc, a.orderby')
            ->paginate(3);
        $noData = false;
        if(count($articleList->toArray()['data']) == 0) $noData = true;
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
            'noData' =>$noData,
        ];
        return view('index', $info);
    }
}
