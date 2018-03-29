<?php
header("content-type:text/html;charset=utf8");
require_once "db_common.php";
$id = isset($_GET['id']) ? $_GET['id'] : redirect("./index.php","未传递id");
$sql = "select * from student where id=$id";
$info_id = $db->fetch_one($sql);
?>
<<!DOCTYPE html>
<html>
<head>
	<title>修改数据</title>
</head>
<body>
	
</body>
</html>