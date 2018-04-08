<?php
namespace Admin\Model;
use \Frame\Libs\BaseModel;

final class ArticleModel extends BaseModel{
	Private $table_name = "article";
	public function fetchOne($sql){
		return $this->pdo->fetchOne($sql);
	}
	public function fetchAll($sql){
		return $this->pdo->fetchAll($sql);
	}

	public function rowCount($sql){
		// $sql="select * from $this->table_name";
		return $this->pdo->rowCount($sql);
	}

	public function insert($arr){
		$str = '';
		foreach ($arr as $key => $value) {
			$str .= "$key='$value',";  //如果逗号后面有空格，则不能将最右边的逗号删除
		} 
		$str = rtrim($str, ",");
		$sql = "insert into $this->table_name set " . $str;
		return $this->pdo->exec($sql);
	}

	public function update($id, $arr){
		$str = '';
		foreach ($arr as $key => $value) {
			$str .= "$key='$value',";  //如果逗号后面有空格，则不能将最右边的逗号删除
		} 
		$str = rtrim($str, ",");
		$sql = "update $this->table_name set  " . $str . "where id=$id";
		return $this->pdo->exec($sql);
	}
	public function delete($id){
		$sql = "delete from $this->table_name where id=$id";
		return $this->pdo->exec($sql);
	}
}
?>