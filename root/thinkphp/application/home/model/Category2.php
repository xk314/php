<?php

namespace app\home\model;

use think\Model;

class Category2 extends Model
{
    static public function categoryList($arrs,$level=0,$pid=0){
        static $res=[];
        foreach($arrs as $line){
            if($line['pid']==$pid){
                $line['level'] = $level;
                $res[] = $line;
                self::categoryList($arrs,$level+1,$line['id']);
            }
        }
        return $res;
    }

    static public function getList()
    {
        $categoryInfo = \think\Db::table('category2')->alias("c")
            ->join('article a','c.id = a.category_id','left')
            ->group('c.id')
            ->field('c.*,count(a.id) article_count')
            ->order('article_count desc')
            ->limit(6)
            ->select();
        return self::categoryList($categoryInfo);
    }
}
