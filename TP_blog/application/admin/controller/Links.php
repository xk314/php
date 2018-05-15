<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Links extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $linksList = \app\admin\model\Links::order('orderby asc')->select();
        $info = [
            'linksList' =>$linksList,
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
        return view('create');
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
            ['domain','require|max:30','链接域名必填|域名长度限制为30'],
            ['url','require|url','url必填|url格式不正确'],
            ['orderby','require|integer|egt:0','优先级必填|优先级需为整数|优先级>=0'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/links/index'));
        }
        $res = \app\admin\model\Links::create(input(),true);
        if(empty($res))
            $this->error('添加友情链接失败',url('admin/links/create'));
        $this->success('添加友情链接成功', url('admin/links/index'));
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
        $link = \app\admin\model\Links::find($id);
        $info = [
            'link' => $link,
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
            ['domain','require|max:30','链接域名必填|域名长度限制为30'],
            ['url','require|url','url必填|url格式不正确'],
            ['orderby','require|integer|egt:0','优先级必填|优先级需为整数|优先级>=0'],
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/links/index'));
        }
        $res = \app\admin\model\Links::update(input(),$id,true);
        if(empty($res))
            $this->error('修改友情链接失败',url('admin/links/create'));
        $this->success('修改友情链接成功', url('admin/links/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Links::find($id)->delete();
        $this->success('删除友情链接成功', url('admin/links/index'));
    }
}
