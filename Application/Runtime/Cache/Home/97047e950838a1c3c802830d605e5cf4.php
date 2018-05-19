<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/header.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/common_index.css" rel="stylesheet" type="text/css">
<link href="/Public/css/footer.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="float_aside"><input type="button" class="btn btn-default back" value="返回上一页" onClick="JavaScript:history.go(-1)"></div>
<div class="header">
	<div class="header_left"><a href="<?php echo U('Home/Index/index');?>">程序员之家</a></div>
	<?php if($_SESSION['user_name']!= null): ?><div class="header_right"><a href="<?php echo U('User/Index/index');?>"><?php echo (session('user_name')); ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('User/Public/logout');?>">退出</a></div>
	
	<?php elseif($_SESSION['admin_name']!= null): ?>
	
	<div class="header_right"><a href="<?php echo U('Admin/Index/index');?>"><?php echo (session('admin_name')); ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Admin/Public/logout');?>">退出</a></div>
	
	<?php else: ?>
	
	<div class="header_right"><a href="<?php echo U('User/Public/login');?>">登入</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('User/Public/register');?>">注册</a></div><?php endif; ?>
	
</div>
<div class="main">
	<div class="_center">
	<div class="left">
		<?php if(is_array($moudle)): $i = 0; $__LIST__ = $moudle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$moudle): $mod = ($i % 2 );++$i;?><a href="/index.php/home/public/showMpost/id/<?php echo ($moudle["moudle_id"]); ?>"><div class="moudle">
			<?php echo ($moudle["title"]); ?>
			</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="right">
	<ul class="nav nav-pills">
  		<li role="presentation" class="label label-primary"><a href="/index.php/home/public/showMpost/id/all">全部</a></li>
  		<li role="presentation" class="label label-success"><a href="/index.php/home/public/showMpost/id/good">精帖</a></li>
  		<li role="presentation" class="label label-warning"><a href="/index.php/home/public/showMpost/id/hot">热帖</a></li>
	</ul>
	<div class="right_main">
		<table>	
			<tr class="intro">
				<td width="100px">类型</td><td width="200px" class="title">标题</td><td width="200px">作者</td><td width="50px">浏览量</td><td width="50px">评论数</td><td width="170px">发帖时间</td>
			</tr>
			<?php if(is_array($postInfo)): $i = 0; $__LIST__ = $postInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
				<td width="100px">
			<?php if(($vol["is_good"] == 1 ) AND ($vol["is_hot"] == 1 )): ?><span class="label label-success">精</span>&nbsp;<span class="label label-warning">热</span>
			<?php elseif($vol["is_good"] == 1): ?>
				<span class="label label-success">精</span>
			<?php elseif($vol["is_hot"] == 1): ?>
				<span class="label label-warning">热</span>
			<?php else: ?>
				<span class="label label-warning"></span><?php endif; ?>
				</td>
				<td width="200px"  class="title"><a href="/index.php/Home/Public/showPost/id/<?php echo ($vol["post_id"]); ?>/author/<?php echo ($vol["author"]); ?>"><?php echo (substr($vol["title"],0,36)); ?>...</a></td>
				<span class="info"><i><td width="200px"><?php echo (substr($vol["author"],0,21)); ?></td><td width="50px"><?php echo ($vol["scan"]); ?></td><td width="50px"><?php echo ($vol["comments"]); ?></td><td width="170px"><?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></td></i></span>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
		</table>
	</div>
	</div>
	</div>
</div>
<div class="footer" style="margin-top: 27px">
	Copyright &copy; 2018 程序员之家 版权所有
</div>

<script>
	function onC(obj){
		$("div[class*='active_live']").removeClass('active_live');
		obj.className='xx active_live';
		
	}
</script>
</body>
</html>