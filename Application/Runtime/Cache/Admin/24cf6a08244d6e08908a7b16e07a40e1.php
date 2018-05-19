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
	<button class="btn btn-info active" name="admin_email_receive" date-src="<?php echo U('receive');?>" onClick="show(this)">收件箱</button>
	<button class="btn btn-success" name="admin_email_send"  date-src="<?php echo U('send');?>"  onClick="show(this)">发件箱</button>
	<button class="btn btn-warning" name="admin_email_tosend"  date-src="<?php echo U('toSend');?>" onClick="show(this)">发邮件</button>
	<button class="btn btn-danger" name="admin_email_recycle" date-src="<?php echo U('recycle');?>"  onClick="show(this)">回收站</button>  
</div>
<div class="next">
	<iframe frameborder="0" src="<?php echo U('receive');?>" width="712" height="455"></iframe>
</div>
</body>

</html>