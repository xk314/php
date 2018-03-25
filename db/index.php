<?php
	header("content-type:text/html;charset=utf8");
	require_once "./db_common.php";
	$sql = "select count(*) from student";
	$res = $db->fetch_one($sql,1);//1表示返回数组为索引数组
	$total_row = $res[0];
	// die($total_row);
	$total_page_num = ceil($total_row/$PAGE_SIZE);
	// die($total_page_num);
	$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	setcookie("now_page",$now_page_index);

	$page = new Page($total_page_num,$now_page_index, "./index.php");
	$star_row_index = ($now_page_index -1)*$PAGE_SIZE;
	$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;

	$sql ="select * from student limit $star_row_index,$end_row_num";
	$result = $db->fetch_all($sql);
	$db->close();
	
?>
<html>
<head>
	<title>列表展示</title>
	 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jq.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		window.onload = function(){
			var id = document.cookie.split("now_page=")[1].split(";")[0];
			document.getElementById(id).style.color="red";
		}
		$("document").ready(function(){
			$("td").click(function(event) {
				$(this).css({
					"background-color": 'yellow',
				});
			});
			$("h2").click(function(event) {
				$("table").toggle();
			});
		});
	</script>
	<style type="text/css">
		a:hover{
			font-size: 15px;
			color:green;
		}
		li{
			margin: 0px 15px;
		}
		tr:hover{
			font-size: 17px;
			color:green;
		}
		td{
			padding:10px;
		}
		table {
			text-align: center;
			margin: 0px auto;
			width: 700px;
		}
	</style>
	<!--  引入bootstrap 源码存放在同级bootstrap目录下 -->
</head>
<body>
	<div class="container" align="center">
	<caption ><h2>学生信息列表</h2></caption><br>
	<caption >共<?=$total_row?>学生</caption><br>
	<table class="table-bordered">
		<tr>
			<td>姓名</td>
			<td>性别</td>
			<td>年龄</td>
			<td>学历</td>
			<td>工资</td>
			<td>奖金</td>
			<td>籍贯</td>
			<td>操作</td>
		</tr>
		<?php foreach($result as $line): ?>
			<tr>
			<td><?=$line["name"]?></td>
			<td><?=$line["sex"]?></td>
			<td><?=$line["age"]?></td>
			<td><?=$line["edu"]?></td>
			<td><?=$line["salary"]?></td>
			<td><?=$line["bonus"]?></td>
			<td><?=$line["city"]?></td>
			<td>
				<a href="./update.php?id=<?=$line['id']?>">修改</a>&nbsp;&nbsp;|
				<a href="./delete.php?id=<?=$line['id']?>">删除</a>
			</td>
			</tr>
		<?php endforeach ?>
	</table><br>
<!-- 	<a href="./add.php">添加文章</a> -->
	<?php $page->show_page()?>
	</div>
	<div>
		<img src="./show_code.php" onclick="this.src='./show_code.php?id='+Math.random()">
	</div>
</body>
</html>
