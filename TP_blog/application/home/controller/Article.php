<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Article extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
        $this->view->engine->layout(false);
        $article = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->find($id);
        $info = [
            'article' => $article,
        ];
        return view('detail', $info);
    }

//    public function getByCategory()
//    {
//        $categoryId = input('id');
//        $articleList = \app\home\model\Article::alias('a')
//            ->join('user u','a.user_id = u.id')
//            ->join('category2 c', 'a.category_id = c.id')
//            ->where('a.category_id','=',$categoryId)
//            ->field('c.id, c.classname,u.id, u.username,a.*')
//            ->order('a.top desc, a.orderby')
//            ->paginate(3,false,['query'=>['id'=>$categoryId],]);
//        $articleTopShow = \app\home\model\Article::alias('a')
//            ->where('top','=',1)->field('a.id, a.title, a.content')->limit(3)->select();
//        $categoryInfo = \app\home\model\Category2::getList();
//        $pageInfo = $articleList->toArray();
//        $info = [
//            'articleList' =>$articleList,
//            'current_page' =>$pageInfo['current_page'],
//            'last_page' =>$pageInfo['last_page'],
//            'topShow' => $articleTopShow,
//            'categoryInfo' =>$categoryInfo,
//        ];
//        return view('showByCategory', $info);
//    }

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
