<?php
header("content-type:text/html;charset=utf8");
spl_autoload_register("load_db");
function load_db($classname){
	$file_path = "./libs/$classname.class.php";
	file_exists($file_path) ? require_once($file_path) : die("加载类文件失败!");
}
//数据库连接配置
	$db_arr = [
			"host" => "localhost",
			"port" =>3306,
			"db_name" => "itcast",
			"db_user" => "root",
			"db_passed" => "123456",
			"db_charset" => "utf8",
	];

	$PAGE_SIZE= 5;
	 $db = Db::get_instance($db_arr);//以单例模式创建数据库连接对象
	// $res = $db->fetch_all("select * from student");
	// echo "<pre>";
	// var_dump($res);
function redirect($url="./index.php", $info="", $delay=3){
	header("refresh:$delay;url=$url");
	die("<h2><p>$info</p><?h2>");
}

$DSN = "mysql:dbname=student;host=127.0.0.1;port=3306";
$user = "root";
$passwd = 123456;


?>