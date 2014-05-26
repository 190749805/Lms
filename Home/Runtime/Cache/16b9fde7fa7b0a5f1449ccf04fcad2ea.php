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
<script src="__PUBLIC__/Js/record.js"></script>
</head>
<body>
<div id="update-div">
	
		<div class="control-group">
          <div class="controls">
            <button class="btn btn-danger" id="b10">返回</button>
          </div>
        </div>
		
	<hidden value="<?php echo ($id); ?>" id="hidden1"></hidden>
		<div class="controls">
            <div class="textarea-div">
                  <textarea type="" class="" cols="120" rows="18" id="textarea-div"><?php echo ($content); ?> </textarea>
            </div>
        </div>
		  
		<div class="control-group">
          <div class="controls">
            <button class="btn btn-success" id="b9">确认修改</button>
          </div>
        </div>
		
</div>
</body>
</html>