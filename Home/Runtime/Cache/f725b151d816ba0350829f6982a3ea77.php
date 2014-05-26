<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/
TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>lms</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="__PUBLIC__/Js/jquery.js"></script>
<script src="__PUBLIC__/Js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Js/ajaxfileupload.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap.min.css" />                       
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap.css" /> 
 

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/home.css" />
<script src="__PUBLIC__/Js/home.js"></script>
<script src="__PUBLIC__/Js/prifile.js"></script>
<script src="__PUBLIC__/Js/viewtime.js"></script>
<script src="__PUBLIC__/Js/changepassword.js"></script>
<script src="__PUBLIC__/Js/cancel.js"></script>
<script src="__PUBLIC__/Js/comment.js"></script>
<script src="__PUBLIC__/Js/record.js"></script>

</head>
<body>
<div class="container" id="div-view">  	
	<div class="form-horizontal" role="form" id="iframe-div">
	<ol>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="color-div"><li><?php echo ($vo["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["filetime"]); ?>&nbsp;&nbsp;<br/>
			<?php echo ($vo["impression"]); ?><br/><?php echo ($vo["filename"]); ?>-<?php echo ($vo["username"]); ?> <br/></div>
			评论:<br/><ol><span class="span-p<?php echo ($vo["id"]); ?>"></span>
			<?php if(is_array($vo['comment'])): $i = 0; $__LIST__ = $vo['comment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><li><span class="span-p"><?php echo ($comment["content"]); ?>---<?php echo ($comment["name"]); ?></span><br/>
			</li><?php endforeach; endif; else: echo "" ;endif; ?></ol><br/>
			<div id="div-input-view<?php echo ($vo["id"]); ?>" style="display:none;">
				<input type="text" id="input-<?php echo ($vo["id"]); ?>" class="form-control input-view " placeholder="请输入你的看法">
				<button class="btn btn-success a-a2" name="<?php echo ($vo["id"]); ?>" id="view-que<?php echo ($vo["id"]); ?>">确认</button>	
				<br/>
			</div>
			<a name="<?php echo ($vo["id"]); ?>" class="a-praise"id="fsda">赞</a><span id="span-id<?php echo ($vo["id"]); ?>"><?php echo ($vo["number"]); ?></span><br/>
			<a class="btn " href="__URL__/download?id=<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>" id="a1">下载</a>
			<a class="btn " href="__URL__/select_impression?id=<?php echo ($vo["id"]); ?>" id="a2">修改</a>
			<a class="btn   a-a3" href="#" name="<?php echo ($vo["id"]); ?>" id="a3">评论</a>
			<a class="btn " href="__URL__/remove?id=<?php echo ($vo["id"]); ?>" id="a4">删除</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?><br/>
		<?php echo ($page); ?>
	</ol>
	</div>
	
	
</div>

</body>
</html>