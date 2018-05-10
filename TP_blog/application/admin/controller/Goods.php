<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Goods extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $googsList = \app\admin\model\Goods::select();
        $info = [
            'goodsList' => $googsList,
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
        $categoryList = \app\admin\model\GoodsCategory::where('pid = 0')->field('id,cate_name')->select();
        $goodsTypeList = \app\admin\model\GoodsType::select();
        $info =[
            'categoryList' => $categoryList,
            'goodsTypeList' =>$goodsTypeList,
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
        $validate = validate('\app\admin\validate\Goods');
//        if(!$validate->check(input())){
//            $msg = $validate->getError();
//            $this->error($msg,url('admin/goods/create'));
//        }

        $goodsAttr = new \app\admin\model\GoodsAndAttr();
        $res = \app\admin\model\Goods::create(input(),true);
        if(empty($res))
            $this->error('新增商品失败',url('admin/goods/index'));
        $goodsAttrData = make_data($res->id,input()['attr']);
       $goodsAttr->saveAll($goodsAttrData);
        $this->success('新增商品成功', url('admin/goods/index'));
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
        dump('修改goods');
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
        \app\admin\model\Goods::find($id)->delete();
        $this->success('删除商品成功', url('admin/goods/index'));
    }
}
