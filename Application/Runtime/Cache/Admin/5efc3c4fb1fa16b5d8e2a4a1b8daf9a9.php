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
			<td width="170px" class="title">用户名</td><td  width="170px" >邮箱</td><td width="100px">积分</td><td width="170px"><span class="info">最近时间&nbsp;</span></td><td width="100px" colspan="2">操作</td>
		</tr>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
			<td width="170px" class="title"><a href="#"><?php echo ($vol["user_name"]); ?></a></td><td  width="170px" ><?php echo ($vol["email"]); ?></td><td width="100px"><?php echo ($vol["grade"]); ?></td><td width="170px"><span class="info"><i><?php echo (date("Y-m-d H:i:s",$vol["time"])); ?>&nbsp;</i></span></td><td width="50px"><a href="/index.php/admin/user/handleSpeak/id/<?php echo ($vol["user_id"]); ?>/status/<?php echo ($vol["is_speak"]); ?>"><button class="btn btn-success btn-xs"><?php if($vol["is_speak"] == 0): ?>禁言<?php else: ?>解禁<?php endif; ?></button></a></td><td width="50px"><button class="btn btn-danger btn-xs">删除</button></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>
</body>
</html>