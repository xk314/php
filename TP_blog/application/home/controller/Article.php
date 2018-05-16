<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Article extends BaseController
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
        \app\home\model\Article::where('id', $id)->setInc('read');
//        $this->view->engine->layout(false);
        $article = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->find($id);
        $pre = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->where(['a.id'=>['<', $id]])
            ->order('a.id desc')->limit(1)
            ->find();

        $next = \app\home\model\Article::alias('a')
            ->join('user u','a.user_id = u.id')
            ->join('category2 c', 'a.category_id = c.id')
            ->field('c.id, c.classname,u.id, u.username,a.*')
            ->where(['a.id'=>['>', $id]])
            ->order('a.id')->limit(1)
            ->find();
        $comment = \app\admin\model\Comment::alias('c')->field('c.*')
            ->join('tpshop_manager m','c.user_id = m.id')->field('m.username')
            ->where('c.article_id', $id)->select();
        $comment = commentList($comment);
        $info = [
            'pre' => $pre,
            'next' => $next,
            'comments' => $comment,
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

    public function praise($id)
    {
        \app\home\model\Article::where('id', $id)->setInc('praise');
        return json(['msg' => 'success']);
    }
    public function comment()
    {
        $comment = \app\home\model\Comment::create(input(), true);
        if(!empty($comment))
            return json(['msg'=>'success']);
    }

}
