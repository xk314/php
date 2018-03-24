<?php
	header("content-type:text/html;charset=utf8");
	include "common.php";
	!isset($_GET["id"]) && redirect("./index.php","参数非法");
	$id = $_GET["id"];
	$sql = "select * from article where aid=$id";
	$res = mysql_query($sql, $link);
	if(!$res || mysql_num_rows($res)==0){
		redirect("./index.php","参数非法");
	}
	$result = mysql_fetch_assoc($res);
	mysql_free_result($res);
	mysql_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>文章展示</title>
</head>
<body>
	<table width="60%" align="center" bgcolor="#eee" border="1px" rules="all">
		<caption>文章详细内容</caption>
		<tr><td><h2><?=$result['title']?></h2></td></tr>
		<tr><td><?=$result['author']?></td></tr>
		<tr><td><?=$result['cat_name']?></td></tr>
		<tr><td><?=$result['description']?></td></tr>
		<tr><td><img src="<?=$result['pic']?>"></td></tr>
		<tr><td><?=$result['comment']?></td></tr>
		<tr><td><?php echo date("Y-m-d H-i-s",$result['add_time']); ?></td></tr>
	</table>
</body>
</html>