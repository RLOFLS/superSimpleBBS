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
	<form action="" method="post">
		<div class="input-group">
  			<span class="input-group-addon">板块标题:</span>
                        <input type="text" name="title" class="form-control">
		</div>
		<div class="input-group">
  			<span class="input-group-addon">板块排序:</span>
  			<input type="number" name="sort" class="form-control">
		</div>
		<div class="textarea">
                    <textarea name="description" class="form-control" rows="14"></textarea>
		</div>
		<div class="handle">
                    <input type="submit" name="submit" value="添加" class="btn btn-success">
                    <input type="reset" name="reset" value="重置" class="btn btn-primary">
	  </div>
	</form>
</div>
</body>
</html>