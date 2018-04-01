<?php
namespace Home\Controller;
use Home\Model\IndexModel;
//类的自动加载通过命名空间来实现，实例化类的对象时需要使用完全限定的方式，或者通过use导入相应命名空间下的类。
final class IndexController{
	private $IndexModel = NULL;

	public function __construct(){
		$this->IndexModel = new IndexModel;
	}
	public function index(){
		$sql = "select * from student";
		var_dump($this->IndexModel->fetchAll($sql));
	}
}
?>