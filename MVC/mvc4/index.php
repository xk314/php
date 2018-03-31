<?php
header("content-type:text/html;charset=utf8");

require_once "./libs/FactoryModel.class.php";
require_once "./libs/Page.class.php";
require_once "./controller/BaseController.class.php";
require_once "./controller/NewsController.class.php";
require_once "./controller/StudentController.class.php";
require_once "./model/BaseModel.class.php";
require_once "./model/NewsModel.class.php";
require_once "./model/StudentModel.class.php";
require_once "./libs/Db.class.php";
//嵌套引入文件时，以最外层文件的路径为依据来设置嵌套引入的路径
$controller = !empty($_GET['c'])? $_GET['c'] : "StudentController";
$action = !empty($_GET['a'])? $_GET['a'] : "index";
$controller = new $controller;
$controller->$action();

?>