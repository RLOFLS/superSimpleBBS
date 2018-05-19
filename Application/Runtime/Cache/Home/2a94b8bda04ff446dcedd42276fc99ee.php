<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/header.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/index.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
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
	<div class="main_left">
		<div class="moudle_one">
			<dl class="notice">
				<dt><?php echo ($notice["title"]); ?></dt>
				<dd><?php echo ($notice["content"]); ?></dd>
			</dl>
			<div class="i"><b>发表时间：</b><i><?php echo (date("Y-m-d H:i:s",$notice["time"])); ?></i></div>
		</div>
		<?php if(is_array($moudle)): $i = 0; $__LIST__ = $moudle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Public/index/id/<?php echo ($vol["moudle_id"]); ?>"><div class="moudle_two">
			<dl>
				<dt><?php echo ($vol["title"]); ?></dt>
				<dd class="dd_content"><?php echo ($vol["description"]); ?></dd>
			</dl>
			<div class="i"><i>浏览量：<?php echo ($vol["scan"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;帖子数：<?php echo ($vol["post_nums"]); ?></i></div>
			</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="main_right" style="margin-top: 17px;">
	<dl>
		<dt>程序员之家的热帖</dt>
		<dd>
			<ol>
			<?php if(is_array($good_post)): $i = 0; $__LIST__ = $good_post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Public/showPost/id/<?php echo ($good["post_id"]); ?>/author/<?php echo ($good["author"]); ?>"><li><span class="label label-warning">热</span>&nbsp;&nbsp;<?php echo (substr($good["title"],0,33)); ?>..</li></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ol>
		</dd>
	</dl>
	<dl>
		<dt>程序员之家的精帖</dt>
		<dd>
			<ol>
				
			<?php if(is_array($hot_post)): $i = 0; $__LIST__ = $hot_post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Public/showPost/id/<?php echo ($hot["post_id"]); ?>/author/<?php echo ($hot["author"]); ?>"><li><span class="label label-success">精</span>&nbsp;&nbsp;<?php echo (substr($hot["title"],0,33)); ?>..</li></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ol>
		</dd>
	</dl>
	</div>
	</div>
</div>
<div class="footer" style="margin-top: 27px">
	Copyright &copy; 2018 程序员之家 版权所有
</div>

</body>
</html>