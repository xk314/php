<?php
	header("content-type:text/html;charset=utf8");
	include "common.php";
	$sql = "select count(*) from article";
	$res = mysql_query($sql, $link);
	$res1 = mysql_fetch_row($res);
	$total_row = $res1[0];
	// die($total_row);
	$total_page_num = ceil($total_row/$PAGE_SIZE);
	// die($total_page_num);
	$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	setcookie("now_page",$now_page_index);

	$page = new Page($total_page_num,$now_page_index, "./index.php");

	$star_row_index = ($now_page_index -1)*$PAGE_SIZE;
	$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;
	$sql ="select aid, title, is_show,author,add_time from article limit $star_row_index,$end_row_num";
	$res = mysql_query($sql, $link);
	if(!$res || mysql_num_rows($res)==0){
		redirect("./index.php","数据库查询失败，请稍后重试！",5);
	}
	$result = [];
	while($line = mysql_fetch_assoc($res)){
		$result[] = $line;
	}

	mysql_free_result($res);
	mysql_close($link);
?>
<html>
<head>
	<title>列表展示</title>
	 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jq.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		window.onload = function(){
			var id = document.cookie.split("=")[1];
			document.getElementById(id).style.color="red";
		}
	</script>
	<!--  引入bootstrap 源码存放在同级bootstrap目录下 -->
</head>
<body>
	<div class="container" align="center">
	<caption ><h2>文章列表</h2></caption>
	<table class="table-bordered" align="center" >
		
		<tr>
			<td>文章编号</td>
			<td>标题</td>
			<td>作者</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
		<?php foreach($result as $line): ?>
			<?php if($line["is_show"] == "是"): ?>
			<tr>
				<td><?=$line["aid"]?></td>
				<td><a href="detail.php?id=<?=$line['aid']?>"><?=$line["title"]?></a></td>
				<td><?=$line["author"]?></td>
				<td><?php echo date("Y-m-d H:i:s",$line["add_time"])?></td>
				<td><a href="edit.php?id=<?=$line['aid']?>">修改</a> || <a href="delete.php?id=<?=$line['aid']?>">删除</a></td>
			</tr>

			<?php endif ?>
		<?php endforeach ?>
	</table>
	<a href="./add.php">添加文章</a>
	<?php $page->show_page()?>
	</div>
</body>
</html>
<!-- || $i>($now_page_index+3) -->