<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1">
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/common.css" rel="stylesheet" type="text/css">
<link href="/Public/css/user_info_update.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<title>程序员之家</title>
</head>

<body>
<div class="content">
	<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="user_id" value="<?php echo ($data["user_id"]); ?>">
	  <div class="input-group">
  			<span class="input-group-addon">头像:</span>
  			<input type="file"  name="header_img"  class="form-control" placeholder="请选择头像">
		</div>
	  <div class="input-group">
  			<span class="input-group-addon" >昵称：</span>
  			<input type="text" name="user_name" class="form-control" value="<?php echo ($data["user_name"]); ?>">
	  </div>
	  <div class="input-group">
		<span class="input-group-addon">性别：</span>
		<?php if($data["sex"] == '男'): ?><span class="input-group-addon"><input type="radio" value="男" name="sex" checked>&nbsp;&nbsp;男</span>
			<span class="input-group-addon"><input type="radio" value="女" name="sex">&nbsp;&nbsp;女</span>
		<?php else: ?>
			<span class="input-group-addon"><input type="radio" value="男" name="sex" >&nbsp;&nbsp;男</span>
			<span class="input-group-addon"><input type="radio" value="女" name="sex" checked>&nbsp;&nbsp;女</span><?php endif; ?>
	  </div>
	  <div class="input-group">
  			<span class="input-group-addon" >地址：</span>
  			<input type="text" name="address" class="form-control"  value="<?php echo ($data["address"]); ?>">
	  </div>
	  <div class="input-group">
  			<span class="input-group-addon" >邮箱：</span>
  			<input type="text" name="email" class="form-control" value="<?php echo ($data["email"]); ?>">
	  </div>
	  <div class="input-group">
  			<span class="input-group-addon" >个性签名：</span>
  			<textarea rows="6" cols="26" name="introduce" class="form-control"><?php echo ($data["introduce"]); ?></textarea>
	  </div>
	  <div class="handle">
			<input type="submit" value="确认修改" class="btn btn-success">
			<input type="reset" value="重置" class="btn btn-warning">
	  </div>
	</form>
</div>
</body>
</html>