<?php
header("content-type:text/html;charset=utf8");

?>

<html>
<head>
	<title>列表展示</title>
	 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jq.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$("document").ready(function(){
			$(":button").click(function(){
				//alert($("select").options[$("select").selectedIndex]);
				alert($(":selected").html());//返回或设置选取对象的HTML内容
			})
		})
	</script>
	
	<!--  引入bootstrap 源码存放在同级bootstrap目录下 -->
</head>
<body>
	<div class="container" >
	<caption ><h2>添加信息</h2></caption><br>
	<form class=".form-group-sm" method="post" action="./insert.php">
		姓名：<input type="text" name="name"></input><br>
		性别：<input type="radio" name="sex" value="男">男</input>
				<input type="radio" name="sex" value="女">女</input><br>
		年龄：<input type="number" name="age"></input><br>
		学历：<select name="xl">
				<option value="研究生">研究生</option>
				<option value="本科生">本科生</option>
				</select><br>
		工资：<input type="number" name="salary"></input><br>
		奖金：<input type="number" name="salary"></input><br>
		籍贯：<input type="text" name="jg"></input><br>

		<input type="submit" value="提交" onclick="return confirm('确定提交？')"></input>
		<input type="reset" value="重置" onclick="return confirm('确定重置？')"></input>
			<input type="button" value="显示"></input>
	</form>
</body>
</html>
