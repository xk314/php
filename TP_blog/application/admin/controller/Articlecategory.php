<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Articlecategory extends BaseController
{
    /**
     * 分类管理
     *
     * @return \think\Response
     */
    public function index()
    {
//        $categoryInfo = \app\admin\model\Category2::getCategoryArticle();
//        //得到对模型执行相应关联查询的结果
//        $categoryInfo = \app\admin\model\Category2::categoryList($categoryInfo);
           $categoryInfo = DB::table('category2')->alias("c")
                ->join('article a','c.id = a.category_id','left')
                ->group('c.id')
               ->order('orderby asc')
               ->field('c.*,count(a.id) num')
               ->select();
        $categoryInfoList=\app\admin\model\Category2::categoryList($categoryInfo);

        $info = [
            'categoryInfoList' => $categoryInfoList,
        ];
        return view('index', $info);
    }

    /**
     * 添加分类.
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
        $rule = [
            ['classname', 'require|max:20','文章分类必填|长度最大为20' ],
            ['orderby' , 'require|integer|between:0,50', '优先级必填|优先级必须为数字|优先级的范围为0-50'],
            ['pid' ,'require','PID必填'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/articlecategory/create'));
        }
        $res = \app\admin\model\Category2::create(input(),true);
        if(empty($res))
            $this->error('创建文章分类失败',url('admin/articlecategory/create'));
        $this->success('创建文章分类成功', url('admin/articlecategory/index'));
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $categoryList = \app\admin\model\Category2::getList();
        $category = \app\admin\model\Category2::find(['id' => $id])->toArray();
       // dump($categoryList);
        $info = [
            'categoryList' => $categoryList,
            'categoryInfo' => $category
        ];
        return view('edit', $info);
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
            ['classname', 'require|max:20','文章分类必填|长度最大为20' ],
            ['orderby' , 'require|integer|between:0,50', '优先级必填|优先级必须为数字|优先级的范围为0-50'],
            ['pid' ,'require','PID必填'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/articlecategory/edit',['id'=>input()['id']]));
        }
        $res = \app\admin\model\Category2::update(input(), [],true);
        if(input()['id'] == $res['id']){
            $this->success('修改分类成功',url('admin/articlecategory/index'));
        }
        $this->error('修改分类失败',url('admin/articlecategory/edit',['id'=>input()['id']]));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if(\app\admin\model\Category2::destroy($id)){
            $this->success('删除分类成功',url('admin/articlecategory/index'));
        }
        $this->error('删除分类失败',url('admin/articlecategory/index'));
    }
}
