<?php
namespace Frame\Libs;
use \Frame\Vendor\PDOWrapper;
//该类是所有的Model类在实例化时，可以根据地址栏参数和默认配置来自动连接对应的数据库，
//相应数据库的PDO对象保存在Model类对象的pdoObject属性指向的对象中的db_pdo属性中。
class BaseModel {
	protected $pdoObject = NULL;//本次请求中根据用于访问的应用及控制器来连接对应的数据库，保存在PDO封装类的实例对象中

	public function __construct(){
		$this->pdoObject = new PDOWrapper;
	}
}
?>