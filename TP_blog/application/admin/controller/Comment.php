<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Comment extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $userInfo = (session('UserInfo')->toArray());
        if($userInfo['role_id'] == '超级管理员') $where = '2>1';
        else $where = ['a.user_id', $userInfo.id];
        $commentList = \app\admin\model\Comment::alias('c')
            ->field('c.*')
            ->join('article a','a.id=c.article_id')
            ->field('a.title')
            ->join('user u', 'u.id=c.user_id')->field('u.username')
            ->where($where)
            ->select();
        $commentList = array_map(function($value){return $value->toArray();}, $commentList);
        $info = [
            'commentList' => $commentList,
        ];
        return view('index', $info);
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
        $comment = \app\admin\model\Comment::alias('c')
            ->field('c.*')
            ->join('article a','a.id=c.article_id')
            ->field('a.title')
            ->join('user u', 'u.id=c.user_id')->field('u.username')
            ->where('c.id', $id)
            ->find()->toArray();
//        $fatherComment = \app\admin\model\Comment::where('id', $comment['pid'])->find()->toArray();
        $sonComment = \app\admin\model\Comment::alias('c')
            ->field('c.*')
            ->join('article a','a.id=c.article_id')
            ->field('a.title')
            ->join('user u', 'u.id=c.user_id')->field('u.username')
            ->where('c.pid', $id)
            ->select();
        $sonComment = array_map(function($value){return $value->toArray();}, $sonComment);
        $info = [
            'comment' => $comment,
            'sonComment' => $sonComment,
        ];
        return view('read', $info);
    }

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
       dump($id);die;
        \app\admin\model\Comment::find($id)->delete();
        $this->success('删除评论成功', url('admin/comment/index'));
    }
}
