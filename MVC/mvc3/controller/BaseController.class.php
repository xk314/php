<?php
require_once "../libs/Page.class.php";
abstract class BaseController{
	protected function redirect($msg="", $time=2, $url="?"){
		echo $msg;
		header("refresh:$time;url=$url");
		die();
	}
}
?>