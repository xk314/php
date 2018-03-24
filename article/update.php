<?php

// aid int unsigned primary key auto_increment,
// 	author varchar(30) not null,
// 	cat_name varchar(20) not null,
// 	is_show enum("是" ,"否") not null,
// 	pic varchar(50),
// 	description varchar(100),
// 	comment text
	header("content-type:text/html;charset='utf8'");
	include "common.php";
	include "conf.php";
	echo "<pre>";
	var_dump($_POST);
	$title = $_POST["title"];
	$author = $_POST["author"];
	$cat_name = $_POST["cat_name"];
	$desc = $_POST["descr"];
	$comment = $_POST["comment"];
	$is_show = $_POST["is_show"];
	$aid = $_POST["id"];

	if(empty($title) || empty($author) || empty($cat_name) || empty($is_show) || empty($desc) || empty($comment))
		redirect("./add.php", "请完整输入文章信息！");
	// $_FILES["upload"] && $up_file_res=judge_upload_file($_FILES["upload"]);
	// $up_file_res["error_msg"] && redirect("./add.php", $up_file_res["error_msg"]);
	$now = time();
	// $save_path = $up_file_res['save_path'];
	$sql = "update article set title='$title', author='$author', cat_name='$cat_name', is_show='$is_show',
			add_time=$now,  description='$desc',comment='$comment' where aid=$aid";
	if(mysql_query($sql, $link)){
		mysql_close($link);
		redirect("./index.php", "文章修改成功！");
	}else{
		mysql_close($link);
		mysql_errno($link);
		redirect("./index.php", "文章修改失败！",10);
	}

?>