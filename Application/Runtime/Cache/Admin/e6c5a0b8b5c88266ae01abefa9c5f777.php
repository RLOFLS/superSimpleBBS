<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/user_home.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>
<body>
<div class="top">
	<dt><div class="image"><img src="/Public/Uploads/<?php echo ($data["header_img"]); ?>"></div></dt>
	<dd>个性签名：<?php echo ($data["introduce"]); ?><br>昵称：<?php echo ($data["admin_name"]); ?><br>性别：<?php echo ($data["sex"]); ?><br>地址：<?php echo ($data["address"]); ?><br>发帖总数：<?php echo ($data["post_nums"]); ?><br>积分：<?php echo ($data["grade"]); ?><br>上次登入ip:<?php echo ($data["last_ip"]); ?><br>上次登入时间：<?php echo (date("Y-m-d H:i:s",$data["last_time"])); ?></dd>
</div>
<div class="floor">
	<p style="font-size: 28px">欢迎来到程序员之家管理中心，admin！</p>
</div>
</body>
</html>