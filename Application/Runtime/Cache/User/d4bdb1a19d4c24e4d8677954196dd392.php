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
<script src="/Public/js/common.js"></script>
<title>程序员之家</title>
</head>
<body>
<div class="top">
	<button class="btn btn-info active" name="user_post_all" onClick="show(this)"  date-src="<?php echo U('showAll');?>">我的帖子</button> 
	<button class="btn btn-warning" name="user_post_send"  onClick="show(this)"  date-src="<?php echo U('send');?>">发帖</button>
	<button class="btn btn-primary" name="user_post_recycle"  onClick="show(this)"  date-src="<?php echo U('recycle');?>">回收站</button> 
</div>
<div class="next">
	<iframe frameborder="0" src="<?php echo U('showAll');?>" width="712" height="455"></iframe>
</div>
</body>

</html>