<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/header.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_user_info.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_user_info.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="float_aside"><input type="button" class="btn btn-default" value="返回上一页" onClick="JavaScript:history.go(-1)"></div>
<div class="header">
	<div class="header_left"><a href="<?php echo U('Home/Index/index');?>">程序员之家</a></div>
	<?php if($_SESSION['user_name']!= null): ?><div class="header_right"><a href="<?php echo U('User/Index/index');?>"><?php echo (session('user_name')); ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('User/Public/logout');?>">退出</a></div>
	
	<?php elseif($_SESSION['admin_name']!= null): ?>
	
	<div class="header_right"><a href="<?php echo U('Admin/Index/index');?>"><?php echo (session('admin_name')); ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Admin/Public/logout');?>">退出</a></div>
	
	<?php else: ?>
	
	<div class="header_right"><a href="<?php echo U('User/Public/login');?>">登入</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('User/Public/register');?>">注册</a></div><?php endif; ?>
	
</div>
<div class="main">
	<div class="main_center">
	<div class="user_info">
		<dl>
			<dt><div class="image"><img src="/Public/Uploads/<?php echo ($data["header_img"]); ?>"></div></dt>
			<dd>昵称：<?php echo ($data["user_name"]); ?>&nbsp;&nbsp;&nbsp;发帖总数：<?php echo ($data["post_nums"]); ?>&nbsp;&nbsp;&nbsp;积分：<?php echo ($data["grade"]); ?></dd>
			<p class="signature"><?php echo ($data["introduce"]); ?></p>
		</dl>
		<h4><?php echo ($data["user_name"]); ?>发的帖子：</h4>
		</div>
		<div class="user_post">
			<table>
			<?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
				<td width="270px"><a href="/index.php/home/public/showPost/id/<?php echo ($vol["post_id"]); ?>/author/<?php echo ($vol["author"]); ?>"><?php echo (substr($vol["title"],0,27)); ?>...</a></td><td width="170px"><i><?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></i></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
		
	</div>
</div>
<div class="footer">
	Copyright &copy; 2018 程序员之家 版权所有
</div>
</body>
</html>