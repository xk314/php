<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"I:\phpstudy\WWW\myproject\public/../application/admin\view\login\index.html";i:1525702421;}*/ ?>

<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="/static/admin/login/css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<!--<link href='http://fonts.useso.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>-->
<!--<link href='http://fonts.useso.com/css?family=Exo+2' rel='stylesheet' type='text/css'>-->
<!--//webfonts-->
<script src="/static/admin/login/js/jquery-3.3.1.js"></script>
</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('input').eq(0).val('Username');
		$('input').eq(1).val('Password');
		$('input').eq(2).val('Code');
		$("form img").triggerHandler("click");
		$('.head-info label').hide();
		$(this).hide();
	});	  
});
</script>
 <!--SIGN UP-->
 <h1>klasikal Login Form</h1>
<div class="login-form">
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
			<div class="clear"> </div>
	<div class="avtar">
		<img src="/static/admin/login/images/avtar.png" />
	</div>
			<form >
					<input type="text" class="text" value="Username" >
						<div class="key">
					<input type="password" value="Password">
						</div>
					<input type="text" value="Code" class="mycode">
					<img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>'"/>
				<div class="signin">
					<input type="button" value="Login" >
				</div>
			</form>
</div>
 <div class="copy-rights">
					<p>Copyright &copy; 2015.Company name All rights reserved.More Templates</p>
			</div>
</body>
<script type="text/javascript">
	$(function($){
		$('.head-info label').hide();
		$('.login-form .close').hide();
		$("input[type='button']").click(
				function() {
					var data = {'username': $('input').eq(0).val(),
								'password' : $('input').eq(1).val(),
								'code' : $('input').eq(2).val(),
								};
					$.ajax({
						'url': "<?php echo url('admin/login/login'); ?>",
						'type': "POST",
						'data': data,
						'dataType': 'json',
						'success': function (result) {
							console.log(result.msg);
							if(result.msg == '登录成功')
								window.location.href = result.url;
						}
					});
		});
		$('input').eq(0).focus(function(){
			if ($(this).val() == 'Username') $(this).val('');
		});
		$('input').eq(1).focus(function(){
			if ($(this).val() == 'Password') $(this).val('');
		});
		$('input').eq(2).focus(function(){
			if ($(this).val() == 'Code') $(this).val('');
		});

		function checkInfo(){
			if($('input').eq(0).val()=='Username')
				if($('input').eq(1).val()=='Passeord')
					if($('input').eq(2).val()=='Code')
						$('.login-form .close').hide();
		}

		$('input').eq(0).blur(function(){
			if (this.value == ''){
				this.value = 'Username';
				$('.lbl-1').hide();
				checkInfo();
				return
			}
			$('.lbl-1').show();
			$('.login-form .close').show();
		});
		$('input').eq(1).blur(function(){
			if (this.value == '') {
				this.value = 'Password';
				$('.lbl-2').hide();
				checkInfo();
				return
			}
			$('.lbl-2').show();
			$('.login-form .close').show();
		});
		$('input').eq(2).blur(function(){
			if (this.value == '') {
				this.value = 'Code';
				$('.lbl-3').hide();
				checkInfo();
				return
			}
			$('.lbl-3').show();
			$('.login-form .close').show();
		});
	});
</script>
</html>