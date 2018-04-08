<?php
namespace Home\Model;
use \Frame\Libs\BaseModel;

final class CategoryModel extends BaseModel{

	private $table_name = "category2";

	public function fetchOne($sql){
		return $this->pdo->fetchOne($sql);
	}
	public function fetchAll($sql){
		return $this->pdo->fetchAll($sql);
	}

	public function categoryList($arrs,$level=0,$pid=0){
		static $res=[];
		foreach($arrs as $line){
			if($line['pid']==$pid){
				$line['level'] = $level;
				$res[] = $line;
				$this->categoryList($arrs,$level+1,$line['id']);
			}
		}
		return $res;
	}
}