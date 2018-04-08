<?php
namespace Frame\Libs;
use \Frame\Vendor\PDOWrapper;
//该类是所有的Model类在实例化时，可以根据地址栏参数和默认配置来自动连接对应的数据库，
//相应数据库的PDO对象保存在Model类对象的pdoObject属性指向的对象中的db_pdo属性中。
class BaseModel {
	protected $pdo = NULL;//本次请求中根据用于访问的应用及控制器来连接对应的数据库，保存在PDO封装类的实例对象中
	
	private static $obj_arrs = array();
	public function __construct(){
		$this->pdo = new PDOWrapper;  //含有一个属性为数据库pdo连接对象的对象
	}
	
	//实现Model类的单例模式，通过在BaseModel中实现创建单例对象的方法，在所有的子Model中都可以调用该方法创建单例。
	//注意此处获取类名的方法。一定要获取后期静态绑定该方法的类名，而不能是定义其的BaseModel类。(后期静态绑定)
	public static function getInstance(){
		//$className = static::who();
		$className = get_called_class();
		if(empty(self::$obj_arrs[$className]))
			self::$obj_arrs[$className] = new $className;
		return self::$obj_arrs[$className];
	}
}
?>