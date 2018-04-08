<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\IndexModel;

final class IndexController extends BaseController{

	private $IndexModel = NULL;
	//在父类的构造方法中如果实现的重要的步骤，则子类中一定要调用父类的构造方法
	// public function __construct(){
	// 	//$this->IndexModel = new IndexModel;
	// 	//$this->IndexModel = IndexModel::getInstance();
	// }
	//包含视图，由于页面中的src属性会自动对其数据源发出请求，所以需封装对应的控制器方法，并将对应的视图返回
	public function index(){
		//require_once(VIEW_PATH.DS."index.html");
		$this->deny_access();
		if(!empty($_SESSION['username']))
			$this->smarty->display("Index/index.html");
	}
	public function top(){
		$this->deny_access();
		$this->smarty->display(VIEW_PATH.DS."Index/top.html");
	}
	public function left(){
		$this->deny_access();
		$this->smarty->display(VIEW_PATH.DS."Index/left.html");
	}
	public function center(){
		$this->deny_access();
		$this->smarty->display(VIEW_PATH.DS."Index/center.html");
	}
	public function main(){
		$this->deny_access();
		$this->smarty->display(VIEW_PATH.DS."Index/main.html");
	}

	
}
?>