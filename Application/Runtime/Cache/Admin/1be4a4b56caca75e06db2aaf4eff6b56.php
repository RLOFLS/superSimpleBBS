<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<link href="/Public/css/admin_login.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="main">
	<div class="admin_login">
	<div class="logo"><a href="<?php echo U('Home/Index/index');?>">程序员之家<br>admin后台登录</a></div>
		<form action="<?php echo U('checkLogin');?>" method="post">
			<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
  			<input type="text" name="admin_name" class="form-control" placeholder="admin用户名">
			</div>
			<div class="input-group">
  				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
  				<input type="password" name="admin_pwd" class="form-control" placeholder="admin密码">
			</div>
			<div class="input-group">
 				<input type="text" name="captcha" class="form-control" placeholder="验证码">
  				<span class=" input-group-addon img"><img src="/index.php/admin/public/captcha" onClick="this.src='/index.php/admin/public/captcha/t'+Math.random()"></span>
			</div>
			<div class="su">
			<input type="submit" value="登入" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
<div class="footer">
	Copyright &copy; 2018 程序员之家 版权所有
</div>
</body>
</html>