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
<script src="__PUBLIC__/Js/student.js"></script>
</head>
<body>
<div class="container prifile-div" > 
	<div class="btn-group">
		<button type="button" class="btn btn-info" id="student-b1">添加学生</button>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-info" id="student-b2">删除学生</button>
	</div>
	
    <div class="form-horizontal iframe" role="form" id="student-add">
	<div>
		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />姓名：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="name" placeholder="姓名必须填写"/>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />学号：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="username" placeholder="学号必须填写"/>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />专业方向：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="specialty" placeholder="选填项"/>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />班级：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="class" placeholder="选填项"/>
		</div>
	  </div>
	  <div class="btn-group">
		<button type="button" class="btn btn-info" id="student-b3">确认添加</button>
	</div>
	</div>
  </div>
  <div id="student-remove"></div>
</div>
</body>
</html>