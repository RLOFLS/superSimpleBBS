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
		<div class="input-group">
  			<span class="input-group-addon">邮件标题:</span>
  			<input type="text"  name="title"  class="form-control">
		</div>
		<div class="input-group">
  			<span class="input-group-addon">收件人:</span>
  			<input type="text"  name="to_someone"  class="form-control">
		</div>
		<div class="input-group">
  			<span class="input-group-addon">发件人:</span>
  			<input type="text" name="from_someone" class="form-control" value="<?php echo (session('user_name')); ?>" readonly>
		</div>
		<div class="textarea">
  			<textarea class="form-control"  name="content"  rows="12"></textarea>
		</div>
		<div class="handle">
			<input type="submit" value="发送" class="btn btn-success">
			<input type="reset" value="重置" class="btn btn-warning">
	  </div>
	</form>
</div>
</body>
</html>