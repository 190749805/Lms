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
 

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
<script src="__PUBLIC__/Js/login.js"></script>
                      
</head>                                                                                                                
<body id="login">  
<div class="container">        
 <div class="form-horizontal" role="form" >
	<h1 class="title">Laboratory Management System</h1>                           -                                                     
		
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" />用户名：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-input" id="inputname" name="username" placeholder="请输入用户名" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
    <div class="col-sm-10">
      <input type="password" class="form-control form-input" id="inputpassword" name="password" placeholder="请输入密码"/>
    </div>
	
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<input type="radio" id="inputradio" name="status" value="1" />教师
	<input type="radio" id="inputradio" name="status" value="0"/>学生
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-default" id="b1">登录</button>
    </div>
  </div>
</div>
	</div>
</body>
</html>