<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
if (!function_exists('getTree')) {
    //递归方法实现无限极分类
    function getTree($list,$pid=0,$level=0) {
        static $tree = array();
        foreach($list as $row) {
            if($row['pid']==$pid) {
                $row['level'] = $level;
                $tree[] = $row;
                getTree($list, $row['id'], $level + 1);
            }
        }
        return $tree;
    }
}

//处理数据，使其可以满足saveAll方法所需的参数格式。物品对应的详细属性
if (!function_exists('make_data')) {
    function make_data($id, $data){
        $res = [];
        foreach($data as $k => $v){
            foreach($v as $i){
                $res[] = ['goods_id'=>$id,'attr_id'=>$k,'attr_value'=>$i];
            }
        }
        return $res;
    }

    if (!function_exists('make_password')) {
        function make_password($password)
        {
            $base = 'jfdsaiofhweohfdosfhweoi';
            return md5(md5($base).$password);
        }
    }
}