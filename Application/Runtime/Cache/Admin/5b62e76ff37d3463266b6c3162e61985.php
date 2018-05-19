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
	<table>	
		<tr class="intro">
			<td width="170px" class="title">板块名</td><td  width="170px" >板块描述</td><td width="100px" class="info">浏览</td><td width="100px"><span class="info">帖子数&nbsp;</span></td><td width="70px"><span class="info">排序&nbsp;</span></td><td width="100px" colspan="2">操作</td>
		</tr>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
			<td width="120px" class="title"><?php echo ($vol["title"]); ?></td><td  width="270px" ><?php echo (substr($vol["description"],0,21)); ?>...</td><td width="100px" class="info"><?php echo ($vol["scan"]); ?></td><td width="100px"><span class="info"><i><?php echo ($vol["post_nums"]); ?>&nbsp;</i></span></td><td width="70px"><span class="info"><?php echo ($vol["sort"]); ?>&nbsp;</span></td><td width="50px"><a href="/index.php/admin/moudle/Update/id/<?php echo ($vol["moudle_id"]); ?>"><button class="btn btn-success btn-xs" >修改</button></a></td><td width="50px"><a href="/index.php/admin/moudle/del/m_id/<?php echo ($vol["moudle_id"]); ?>"><button class="btn btn-danger btn-xs"  onClick="return confirm('确认删除么');">删除</button></a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>
</body>
</html>