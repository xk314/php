<?php

namespace app\admin\model;

use think\Model;

class Manager extends Model
{
    protected $table = 'tpshop_manager';
    //    设置自动完成
    protected $insert = ['create_time','status','role_id'];  //在插入数据时会对该字段自动进行设置
    //status在原表中设置为default 1，如果不在此处设置，则Tp不会在插入新数据的时候去自动修改status字段
    //继而触发mysql数据库将status默认设置为1
    protected $update = ['update_time'];

    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d",$value);
    }
    public function setCreateTimeAttr()
    {
        return time();
    }
    public function getUpdateTimeAttr($value)
    {
        if(empty($value)) return '未修改';
        return date("Y-m-d",$value);
    }
    public function setUpdateTimeAttr()
    {
        return time();
    }


    public function getLastLoginTimeAttr($value)
    {
        if(empty($value)) return '暂未登录';
        return date("Y-m-d",$value);
    }





    public function getStatusAttr($value)
    {
        $v = ['注销','禁用','正常'];
        return $v[$value];
    }
//自动完成
    public function setStatusAttr($value)
    {
        //默认将新创建的用户的状态设置为正常
        if(!in_array($value,['注销','禁用','正常'])){
            return 2;
        }
        $arr = ['注销'=>0,'禁用'=>1, '正常'=>2,];
        return $arr[$value];
    }

//在模型类中如果设置了获取器，会影响使用Model进行关联查询
//字段的获取器和修改器的操作要一致。如果设置了获取器，则外部程序在对模型对象的字段进行判断时，需要依据获取器
//返回的值进行判断
    public  function getRoleIdAttr($value)
    {
        $arr = [0=>'超级管理员',1=>'主管',2=>'经理',3=>"普通用户"];
        return $arr[$value];
    }
    public function setRoleIdAttr($value)
    {
        $arr = [
            '超级管理员'=>0,
            '主管' =>1,
            '经理' => 2,
            '普通用户' => 3,
        ];
        //表单提交过来的数据都为字符串形式，所以不可使用全等或不全等进行判断，否则永远不会满足条件
        if(empty($value)&& $value != 0){
            return $arr['普通用户'];
        }
        return $value;
      }
}
