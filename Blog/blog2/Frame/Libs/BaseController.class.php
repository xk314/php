<?php
namespace Frame\Libs;
use \Frame\Vendor\Smarty;//该类通过继承第三方提供的Smarty类来间接的提供功能。
abstract class BaseController{
	protected $smarty = NULL;
//大多数的控制器会使用模板来为用户提供html界面。通过在BaseController中将Smarty对象绑定在可继承的属性上，之后继承该类的所有子类控制器都会拥有一个用于处理Smarty模板的对象。
//将类中公共的部分抽象到基类中。
	public function __construct(){
		
		$smarty = new Smarty;
		$smarty->left_delimiter = "<{";
		$smarty->right_delimiter = "}>";
		$smarty->setTemplateDir(VIEW_PATH);
		$smarty->setCompileDir(sys_get_temp_dir().DS."view".DS);
		//创建Smarty对象，设置左右分界符，指定模板的存放目录，该目录与实时的控制器对应。指定编译后的模板存放的位置。
		$this->smarty = $smarty;
		//将smarty对象保存在基类中的可继承属性中。
	}

	protected function deny_access(){
		if(empty($_SESSION['username'])){
			header("refresh:1;url=?p=Admin&c=User&a=login");
		}
	}

	protected function jump($msg, $time=3, $url){
		$this->smarty->assign("msg", $msg);
		$this->smarty->assign("time", $time);
		$this->smarty->assign("url", $url);
		$this->smarty->display("Public/jump.html");
	}

}
?>