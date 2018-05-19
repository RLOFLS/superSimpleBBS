<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/user_info_manage.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/js/common.js"></script>
<title>程序员之家</title>
</head>
<body>
<div class="top">
	<button class="btn btn-success active" name="user_info_update" onClick="show(this)"  date-src="<?php echo U('update');?>">修改个人信息</button>
	<button class="btn btn-warning" name="user_pwd_update"  onClick="show(this)"   date-src="<?php echo U('update_pwd');?>">修改账户密码</button>  
</div>
<div class="next">
	<iframe frameborder="0" src="<?php echo U('update');?>" width="712" height="455"></iframe>
</div>
</body>

</html>