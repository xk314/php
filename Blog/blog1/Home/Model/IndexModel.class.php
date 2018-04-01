<?php
namespace Home\Model;
use Frame\Libs\BaseModel;
//每个model类都继承自BaseModel类，其中的一个私有属性为PDOWrapper类的实例化对象。
//该类的实例化对象中的一个属性保存着连接对应数据库的PDO实例化对象。
//对IndexModel实例化对象的操作，最后都转化为对其中包含的PDO对象的操作。
//该PDO对象的创建是根据本次请求中用户传递的地址栏参数及本次调用的应用的默认配置。
final class IndexModel extends BaseModel{
	
	public function fetchOne($sql){
		return $this->pdoObject->fetchOne($sql);
	}
	public function fetchAll($sql){
		return $this->pdoObject->fetchAll($sql);
	}
}
?>