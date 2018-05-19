<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/header.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_post.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
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
		<div class="content">
			<div class="simple_info">
				<dl>
					<a href="/index.php/home/public/showInfo/id/<?php echo ($authorInfo["user_id"]); ?>"><dt><div class="image"><img src="/Public/Uploads/<?php echo ($authorInfo["header_img"]); ?>"></div></dt>
					<dd><?php if($authorInfo["user_name"] != null): ?>昵称：<?php echo ($authorInfo["user_name"]); ?>
					<?php else: ?>
					    昵称：<?php echo ($authorInfo["admin_name"]); endif; ?>
					<br>发帖总数：<?php echo ($authorInfo["post_nums"]); ?><br>积分：<?php echo ($authorInfo["grade"]); ?></dd>
					</a>
				</dl>
			</div>
			<div class="article_info">
				<h1><?php echo ($postInfo["title"]); ?></h1>
				<p class="p_small">时间：<?php echo (date("Y-m-d H:i:s",$postInfo["time"])); ?>&nbsp;&nbsp;浏览：<?php echo ($postInfo["scan"]); ?>&nbsp;&nbsp; 评论：<?php echo ($postInfo["comments"]); ?></p>
				<p>
					<?php echo (htmlspecialchars_decode($postInfo["content"])); ?>
				</p>
			</div>
		</div>
		<div class="comment">
			<form action="/index.php/home/public/comment/id/<?php echo ($postInfo["post_id"]); ?>" method="post">
				<textarea autofocus name="content">来评论一下</textarea>
				<div class="text_btn">
					<input type="submit" name="submit" class="btn btn-success" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" class="btn btn-danger" value="重置">
				</div>
			</form>
		</div>
		<div class="comments">
		<?php if(is_array($cmtInfo)): $i = 0; $__LIST__ = $cmtInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="part"><div class="comments_left">
				
					<a href="/index.php/home/public/showInfo/id/<?php echo ($vol["user_id"]); ?>">
					<div class="image_small">
					<?php if($vol["header_img"] == null): ?><img src="/Public/Uploads/default/1.JPG">
					<?php else: ?>
						<img src="/Public/Uploads/<?php echo ($vol["header_img"]); ?>"><?php endif; ?>
					</div>
					<span>昵称：<?php echo ($vol["cmt_user"]); ?><br>发帖总数：<?php echo ($vol["post_nums"]); ?><br>积分：<?php echo ($vol["grade"]); ?></span></a>
			
			</div>
			<div class="comments_right">
			<p><?php echo ($vol["content"]); ?></p>
			<span>时间：<?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></span>
			</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		
	</div>
</div>
<div class="footer" style="margin-top: 27px">
	Copyright &copy; 2018 程序员之家 版权所有
</div>

</body>
</html>