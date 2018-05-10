<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Goodsattr extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $goodsAttrList = \app\admin\model\Goodsattr::alias('a')
            ->join('tpshop_type t','a.type_id = t.id', 'left')
            ->field('a.*, t.type_name')->select();
        $info = [
            'goodsAttrList' => $goodsAttrList,
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
        $goodsTypeList = \app\admin\model\GoodsType::select();
        $info = [
            'goodsTypeList' =>$goodsTypeList,
        ];
        return view('create', $info);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {

        $validate = validate('\app\admin\validate\GoodsAttr');
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/goodsattr/index'));
        }
        $res = \app\admin\model\Goodsattr::create(input(),true);
        if(empty($res))
            $this->error('新增商品属性失败',url('admin/goodsattr/index'));
        $this->success('新增商品属性成功', url('admin/goodsattr/index'));
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
        $goodsAttrInfo = \app\admin\model\Goodsattr::find($id);
        $goodsTypeList = \app\admin\model\GoodsType::select();
        $info = [
            'goodsAttrInfo' =>$goodsAttrInfo,
            'goodsTypeList' =>$goodsTypeList,
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
        $validate = validate('\app\admin\validate\GoodsAttr');
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/goodsattr/index'));
        }
        $res = \app\admin\model\Goodsattr::update(input(),$id,true);
        if(empty($res))
            $this->error('修改商品属性失败',url('admin/goodsattr/index'));
        $this->success('修改商品属性成功', url('admin/goodsattr/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\Goodsattr::where('id',$id)->delete();
        $this->success('删除商品属性成功', url('admin/goodsattr/index'));
    }
}
