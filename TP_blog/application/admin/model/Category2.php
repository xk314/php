<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class Category2 extends Model
{
    public function article()
    {
        return $this->hasMany('Article', 'category_id');
        //建立与本模型存在一对多关系的模型类的信息
    }
    static function getCategoryArticle()
    {
        return self::with("article")->group('Article.category_id')->count('id')->select();
        //返回对当前表执行关联查询的结果
        //通过该方法返回的是一个数组
        //该数组中的元素为app\admin\model\Category2类的实例化对象
        //每个对象中都会含有一个Article属性，该属性名与上面的article方法名同名
        //Article属性指向一个数组，该数组中的元素为app\admin\model\Article类的实例化对象，
        //表示与当前Category2表中记录相关联的Article表中的记录
    }
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
        $categoryInfo = DB::table('category2')->alias("c")
            ->join('article a','c.id = a.category_id','left')
            ->group('c.id')
            ->field('c.*,count(a.id) num')
            ->select();
        return self::categoryList($categoryInfo);
    }
}
