<?php
namespace Admin\Controller;
use \Admin\Model\IndexModel;

final class IndexController{

	private $IndexModel = NULL;

	public function __construct(){
		$this->IndexModel = new IndexModel;
	}
	public function index(){
		$sql = "select * from links";
		var_dump($this->IndexModel->fetchAll($sql));
	}
}
?>