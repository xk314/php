<?php
	header("content-type:text/html;charset='utf8'");
	include "common.php";
	include "conf.php";
	//var_dump($_POST);
	$title = $_POST["title"];
	$author = $_POST["author"];
	$cat_name = $_POST["cat_name"];
	$desc = $_POST["descr"];
	$comment = $_POST["comment"];
	$is_show = $_POST["is_show"];

	if(empty($title) || empty($author) || empty($cat_name) || empty($is_show) || empty($desc) || empty($comment))
		redirect("./add.php", "请完整输入文章信息！");
	$_FILES["upload"] && $up_file_res=judge_upload_file($_FILES["upload"]);

	$up_file_res["error_msg"] && redirect("./add.php", $up_file_res["error_msg"]);

	$now = time();
	$save_path = $up_file_res['save_path'];
	$sql = "insert into article set title='$title', author='$author', cat_name='$cat_name', is_show='$is_show',
			add_time=$now, pic='$save_path', description='$desc',comment='$comment'";
	if(mysql_query($sql, $link)){
		mysql_close($link);
		redirect("./index.php", "文章添加成功！");
	}else{
		mysql_close($link);
		echo mysql_errno();
		redirect("./add.php", "文章添加失败！");
	}

?>