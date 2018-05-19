<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<link href="/Public/css/user_login.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="main">
	<div class="user_login">
	<div class="logo"><a href="<?php echo U('Home/Index/index');?>">程序员之家</a></div>
		<form action="<?php echo U('checkLogin');?>" method="post">
			<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
  			<input type="text" name="user_name" class="form-control" placeholder="请输入用户名">
			</div>
			<div class="input-group">
  				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
  				<input type="password" name="user_pwd" class="form-control" placeholder="请输入密码">
			</div>
			<div class="input-group">
 				<input type="text" name="captcha" class="form-control" placeholder="验证码">
  				<span class=" input-group-addon img"><img src="/index.php/user/public/captcha_t" onClick="this.src='/index.php/user/public/captcha_t/t'+Math.random()"></span>
			</div>
			<div class="subu">
			<input type="submit" value="登录" class="btn btn-success">
			<a href="<?php echo U('jumpR');?>"><input type="button" value="注册" class="btn btn-warning" ></a>
			<!--<input type="button" value="找回密码" class="btn btn-info btn-xs">-->
			</div>
		</form>
	</div>
</div>
<div class="footer">
	Copyright &copy; 2018 程序员之家 版权所有
</div>
</body>
</html>