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
			<td width="150px" class="title">邮件标题</td><td width="100px" >邮件内容</td><td width="220px">收件人</td><td width="170px"><span class="info">时间&nbsp;</span></td><td width="100px" colspan="2">操作</td>
		</tr>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="intro">
			<td width="150px" class="title"><?php echo (substr($vol["title"],0,18)); ?>...</td><td width="220px" ><?php echo (substr($vol["content"],0,21)); ?>...</td><td width="220px"><?php echo ($vol["to_someone"]); ?></td><td width="220px"><span class="info"><i><?php echo (date("Y-m-d H:i:s",$vol["time"])); ?>&nbsp;</i></span></td><td width="50px"><button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#myModal<?php echo ($vol["email_id"]); ?>">查看</button></td><td width="50px"><a href="/index.php/user/email/del/id/<?php echo ($vol["email_id"]); ?>/ed/2"><button class="btn btn-danger btn-xs" onClick="return confirm('确认删除么');">删除</button></a></td>
			
			<div class="modal fade" id="myModal<?php echo ($vol["email_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo ($vol["title"]); ?></h4>
        <span class="info">发件人：<?php echo ($vol["from_someone"]); ?>&nbsp;|收件人：<?php echo ($vol["to_someone"]); ?>&nbsp;&nbsp;&nbsp;时间：<?php echo (date("Y-m-d H:i:s",$vol["time"])); ?></span>
      </div>
      <div class="modal-body">
        <?php echo ($vol["content"]); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>
      </div>
    </div>
  </div>
</div>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	
		
	</table>
</div>
</body>
</html>