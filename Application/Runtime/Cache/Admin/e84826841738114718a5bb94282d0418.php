<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/header.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_back.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/js/common.js"></script>
<title>程序员之家</title>
</head>
<body>
<div class="float_aside"><input type="button" class="btn btn-default" value="返回上一页" onClick="JavaScript:history.go(-1)"></div>
<div class="header">
	<div class="header_left"><a href="<?php echo U('Home/Index/index');?>">程序员之家</a></div>
	<div class="header_right"><a href="#"><div class="image_xs"><img src="/Public/Uploads/<?php echo (session('header_img')); ?>"></div><?php echo (session('admin_name')); ?></a>&nbsp;&nbsp;&nbsp;<a href="/index.php/Admin/Public/logout">退出</a></div>
</div>
<div class="main">
	<div class="main_center">
		<div class="nav_left">
			<div class="nav_one active_live" name="admin_home" onClick="showManage(this) " date-src="<?php echo U('Index/home');?>">首页</div>
			<div class="nav_one" name="admin_info_manage" onClick="showManage(this)" date-src="<?php echo U('Info/infoManage');?>">个人管理</div>
			<div class="nav_one" name="admin_post_manage" onClick="showManage(this)" date-src="<?php echo U('Post/postManage');?>">超级帖子管理</div>
			<div class="nav_one" name="admin_comment_manage" onClick="showManage(this)" date-src="<?php echo U('Comment/commentManage');?>">超级评论管理</div>
			<div class="nav_one" name="admin_user_manage" onClick="showManage(this)" date-src="<?php echo U('User/userManage');?>">用户管理</div>
			<div class="nav_one" name="admin_moudle_manage" onClick="showManage(this)" date-src="<?php echo U('Moudle/moudleManage');?>">模块管理</div>
			<div class="nav_one" name="admin_email_manage" onClick="showManage(this)" date-src="<?php echo U('Email/emailManage');?>">邮件管理</div>
			<div class="nav_one" name="admin_notice_manage" onClick="showManage(this)" date-src="<?php echo U('Notice/noticeManage');?>">公告管理</div>
		</div>
		<div class="main_right">
			<iframe name="user_iframe" frameborder="0" src="<?php echo U('home');?>" width="714" height="534"></iframe>
		</div>
	</div>
</div>
<div class="footer">
	Copyright &copy; 2018 程序员之家 版权所有
</div>
</body>
</html>