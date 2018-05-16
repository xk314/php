<?php

namespace app\admin\controller;

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
        $userInfo = (session('UserInfo')->toArray());
        if($userInfo['role_id'] == '超级管理员') $where = '2>1';
        else $where = "a.user_id = ".$userInfo['id'];
        $join = [
            ['tpshop_manager u','a.user_id = u.id','LEFT'],
            ['category2 c', 'a.category_id = c.id', 'LEFT'],
        ];
        $field = "u.username,c.classname,a.top, a.id,a.title,a.addate";
        $infoArr = \app\admin\model\Article::alias('a')->join($join)
            ->field($field)
            ->where($where)
            ->order('a.top desc,a.orderby')
            ->select();
        //$infoArr = array_map(function($obj){return $obj->toArray();},$infoArr);
        //select查询结果为数组形式，通过上述方式将数组中的对象转化为数组
       // dump($infoArr[0]->addate);
        $info = [
            'infoArr' => $infoArr,
        ];
        return view('index',$info);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $categoryList = \app\admin\model\Category2::getList();
        $info = [
            'categoryList' => $categoryList,
        ];
        return view('create',$info);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        dump(input());
        $rule = [
            ['category_id', 'require|integer','文章分类必填|必须为整数' ],
            ['title' , 'require|max:30', '文章标题必填|长度不能超过30'],
            ['orderby' ,'require','优先级必填'],
            ['content' ,'require','文章内容缺失'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/article/index'));
        }
        $res = \app\admin\model\Article::create(input(),true);
        if(empty($res))
            $this->error('添加文章失败',url('admin/article/index'));
        $this->success('添加文章成功', url('admin/article/index'));
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $article = \app\admin\model\Article::find($id);
        $categoryList = \app\admin\model\Category2::getList();
        $info = [
            'article' =>$article,
            'categoryList' =>$categoryList,
        ];
        return view('read',$info);

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $article = \app\admin\model\Article::find($id);
        $categoryList = \app\admin\model\Category2::getList();
        $info = [
            'article' =>$article,
            'categoryList' =>$categoryList,
        ];
        return view('edit',$info);
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
        $rule = [
            ['category_id', 'require|integer','文章分类必填|必须为整数' ],
            ['title' , 'require|max:30', '文章标题必填|长度不能超过30'],
            ['orderby' ,'require','优先级必填'],
            ['content' ,'require','文章内容缺失'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/article/edit',['id'=>$id]));
        }
        $res = \app\admin\model\Article::update(input(),$id,true);
        if(empty($res))
            $this->error('修改文章失败',url('admin/article/edit',['id'=>$id]));
        $this->success('修改文章成功', url('admin/article/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Article::destroy($id) && $this->success('删除文章成功',url('admin/article/index'));
        $this->error('删除文章失败',url('admin/article/index'));
    }
}
