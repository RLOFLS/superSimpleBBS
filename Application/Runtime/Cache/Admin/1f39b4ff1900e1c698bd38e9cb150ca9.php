<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_back.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="content">
	<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="admin_id" value="<?php echo (session('admin_id')); ?>">
	  <div class="input-group">
  			<span class="input-group-addon">原密码:</span>
  			<input type="password" name="old_pwd" class="form-control">
		</div>
	  <div class="input-group">
  			<span class="input-group-addon">新密码：</span>
  			<input type="password" name="admin_pwd" class="form-control">
	  </div>
	  <div class="handle">
			<input type="submit" name="submit" value="确认修改" class="btn btn-success">
			<input type="reset" value="重置" class="btn btn-warning">
	  </div>
	</form>
</div>
</body>
</html>