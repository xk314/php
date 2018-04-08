<?php
namespace Admin\Model;
use Frame\Libs\BaseModel;
//每个model类都继承自BaseModel类，其中的一个私有属性为PDOWrapper类的实例化对象。
//该类的实例化对象中的一个属性保存着连接对应数据库的PDO实例化对象。
//对IndexModel实例化对象的操作，最后都转化为对其中包含的PDO对象的操作。
//该PDO对象的创建是根据本次请求中用户传递的地址栏参数及本次调用的应用的默认配置。
final class UserModel extends BaseModel{
	private $table_name = "user";

	public function fetchOne($sql){
		return $this->pdo->fetchOne($sql);
	}
	public function fetchAll($sql){
		return $this->pdo->fetchAll($sql);
	}

	public function rowCount(){
		$sql = "select * from $this->table_name";
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