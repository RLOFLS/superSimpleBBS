<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<link href="/Public/css/user_register.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="main">
	<div class="user_register">
	<div class="logo"><a href="<?php echo U('Home/Index/index');?>">程序员之家用户注册</a></div>
		<form action="" method="post">
			<div class="input-group">
  			<span class="input-group-addon">用户名：</span>
  			<input type="text" name="user_name" class="form-control">
			</div>
			<div class="input-group">
  				<span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
  				<input type="password" name="user_pwd" class="form-control">
			</div>
			<div class="input-group">
			    <span class="input-group-addon">性别：</span>
				<span class="input-group-addon"><input type="radio" value="男" name="sex">&nbsp;&nbsp;男</span> 
				<span class="input-group-addon"><input type="radio" value="女" name="sex">&nbsp;&nbsp;女</span>
			</div>
			<div class="input-group">
  				<span class="input-group-addon">地&nbsp;&nbsp;&nbsp;&nbsp;址：</span>
  				<input type="text" name="address" class="form-control">
			</div>
			<div class="input-group">
  				<span class="input-group-addon">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span>
  				<input type="text" name="email" class="form-control">
			</div>
			<div class="sure">
			<a href="<?php echo U('register');?>"><input type="submit" name="submit" value="马上注册" class="btn btn-success"></a>
			<input type="reset" value="重置" class="btn btn-warning">
			</div>
		</form>
	</div>
</div>
<div class="footer">
	Copyright &copy; 2018 程序员之家 版权所有
</div>
</body>
</html>