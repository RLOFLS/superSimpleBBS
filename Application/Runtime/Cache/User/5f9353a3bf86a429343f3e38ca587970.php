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
			<td width="70px">类型</td><td width="170px" class="title">帖子标题</td><td width="70px">作者</td><td width="70px">浏览</td><td width="70px">评论</td><td width="170px">时间</td><td width="150px" colspan="3">操作</td>
		</tr>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
			<td width="70px">
			<?php if(($vol["is_good"] == 1 ) AND ($vol["is_hot"] == 1 )): ?><span class="label label-success">精</span>&nbsp;<span class="label label-warning">热</span>
			<?php elseif($vol["is_good"] == 1): ?>
				<span class="label label-success">精</span>
			<?php elseif($vol["is_hot"] == 1): ?>
				<span class="label label-warning">热</span>
			<?php else: ?>
				<span class="label label-warning"></span><?php endif; ?></td><td width="170px" class="title"><a href="post.html"><?php echo (substr($vol["title"],0,18)); ?>...</a></td><span class="info"><td width="70px"><i><?php echo ($vol["author"]); ?></i></td><td width="70px"><i><?php echo ($vol["scan"]); ?></i></td><td width="70px"><i><?php echo ($vol["comments"]); ?></i></td><td width="170px"><i><?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></i></td></span><td width="50px"><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo ($vol["post_id"]); ?>">查看</button></td><td><a href="/index.php/user/post/recover/id/<?php echo ($vol["post_id"]); ?>"><button class="btn btn-primary btn-xs" >恢复</button></a></td><td width="50px"><a href="/index.php/user/post/del/id/<?php echo ($vol["post_id"]); ?>/ud/1"><button class="btn btn-danger btn-xs" onClick="return confirm('确认删除么');">删除</button></a></td>
			
<div class="modal fade" id="myModal<?php echo ($vol["post_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo ($vol["title"]); ?></h4>
        <span class="info">作者：<?php echo ($vol["author"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></span>
      </div>
      <div class="modal-body">
        <?php echo (htmlspecialchars_decode($vol["content"])); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	
		
	</table>
</div>
</body>
</html>