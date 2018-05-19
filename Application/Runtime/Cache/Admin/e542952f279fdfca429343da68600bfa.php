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
<script src="/Public/ue/ueditor.config.js"></script>
<script src="/Public/ue/ueditor.all.min.js"></script>
<script src="/Public/ue/lang/zh-cn/zh-cn.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="content">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="input-group">
  			<span class="input-group-addon">标题:</span>
  			<input type="text" name="title" class="form-control">
		</div>
		<div class="input-group">
  			<span class="input-group-addon">选择板块:</span>
  			<select class="form-control" name="moudle_id">
  			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["moudle_id"]); ?>"><?php echo ($vol["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="textarea">
  			<script id="editor" type="text/plain" name="content" style="width:670px;height:180px"></script>
		</div>
		<div class="handle">
			<input type="submit" name="submit" value="发表" class="btn btn-success">
			<input type="reset" value="重置" class="btn btn-warning">
	  </div>
	</form>
</div>
<script>
	var ue=UE.getEditor('editor');
</script>
</body>
</html>