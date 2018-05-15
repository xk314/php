<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Articlecategory extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $goodsTypeList = \app\admin\model\GoodsType::select();
        $info = [
            'goodsTypeList' =>$goodsTypeList,
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
        return view();
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
            ['type_name', 'require|max:30','商品类型必填|长度不能超过30']
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/goodstype/index'));
        }
        $check = input('type_name');
        $check = \app\admin\model\GoodsType::where("type_name",$check)->find();
        if(!empty($check))
            $this->error('商品类型重名,请重新填写',url('admin/goodstype/create'));
        $res = \app\admin\model\GoodsType::create(input(),true);
        if(empty($res))
            $this->error('添加商品类型失败',url('admin/goodstype/index'));
        $this->success('添加商品类型成功', url('admin/goodstype/index'));

    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $goodsTypeAttrList = \app\admin\model\Goodsattr::where('type_id',$id)->select();
        $goodsTypeAttrList = array_map(function($value){$value->attr_values = explode(',',$value->attr_values);return $value->toArray();},$goodsTypeAttrList);

        return $goodsTypeAttrList;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $typeInfo = \app\admin\model\GoodsType::find($id);
        $info = [
            'typeInfo'=>$typeInfo,
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
            ['type_name', 'require|max:30','商品类型必填|长度不能超过30']
        ];
        $validate = new \think\Validate($rule);
        if(!$validate->check(input())){
            $msg = $validate->getError();
            $this->error($msg,url('admin/goodstype/index'));
        }
        $res = \app\admin\model\GoodsType::update(input(),$id,true);
        if(empty($res))
            $this->error('修改商品类型失败',url('admin/goodstype/index'));
        $this->success('修改商品类型成功', url('admin/goodstype/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\admin\model\GoodsType::where('id',$id)->delete();
        $this->success('删除商品类型成功', url('admin/goodstype/index'));
    }
}
