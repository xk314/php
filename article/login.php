<?php
	header("content-type:text/html;charset=utf8");
?>
<!DOCTYPE html>
<html>
<head>
	<title>登录页面</title>
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}
		.login{
			border: 1px solid #D8F5EA;
			margin: 50px auto;
			text-align: center;
			background-color: #D8F5EA;
			width: 300px;
		}
		img{
			width: 70px;
			height: 20px;
		}
		.rember{
			font-size: 5px;
		}
		/*img:hover{
			width: 100px;
			height: 40px;
		}*/
		tr.center{
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function change(obj,events){//事件触发时将当前对象this传递过来，修改当前节点对象的html属性值
		//event对象中包含着当前事件的详细信息
			obj.src="./code.php?id="+Math.random(); 
			// alert(events.clientX+" "+events.clientY+events.target);  
		}
	</script> 
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jq.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<!--  引入bootstrap 源码存放在同级bootstrap目录下-->

</head>
<body>
	<div class="container">
		<table class="login"  class="table-bordered">
			<form action="./validate.php" method="post" >
				<tr>
					<td>用户名</td>
					<td><input type="text" name="name" autofocus
					 placeholder="请输入用户名"></input></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="passwd" name="passwd"></input></td>
				</tr>
				<tr>
					<td>验证码</td>
					<td><input type="text" name="code"></input></td>
					<td><img src="./code.php" onclick="change(this,event)"></td>
				</tr>
				<tr class="rember">
					<td colspan="2">记住用户名&nbsp;&nbsp;
						是<input type="checkbox" name="rember" value="是"></input>
					</td>
				</tr>
				<tr class="center">
					<td colspan="2"><input type="submit" name="login_or_zc" value="登录"></input>
					<input type="submit" name="login_or_zc" value="注册"></td>
				</tr>
			</form>
		</table>
	</div>	
</body>
</html