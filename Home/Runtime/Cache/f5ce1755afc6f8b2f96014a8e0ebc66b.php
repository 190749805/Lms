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
                                                                                                                
<body id="home" onload="startTime()"> 
<h1 class="title">Laboratory Management System</h1>  
<p id="time"><p>   
<div class="container home-menu" id="container-mentu"> 
<div class="panel-group home-menu" id="accordion2">
  <div class="panel panel-default home-menu">
    <div class="panel-heading home-menu" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> 
		<a class="accordion-toggle home-a">基本信息</a> </div>
    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
      <div class="panel-body">
		<a class="home-a home-a1" id="view-prifile">查看资料</a>
	  </div>
	  <div class="panel-body">
		<a class="home-a home-a1" id="change-password">修改密码</a>
	  </div>
    </div>
  </div>
  <div class="panel panel-default home-menu">
    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
		<a class="accordion-toggle home-a">学生信息</a></div>
    <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
	  
	  <div class="panel-body">
		<a class="home-a home-a1" id="view-record">学生管理</a>
	  </div>
	  
      <div class="panel-body">
		<a class="home-a home-a1" id="view-impression">查看学生记录</a>
	  </div>
    </div>
  </div>
  <div class="panel panel-default  home-menu">
    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" id="div-a"> 
		<a class="accordion-toggle home-a" id='cancel'>
		退出系统
		</a> </div>
    
  </div>
</div>
 
</div>
<div>
<div class="container prifile-div" >                                                              
		<div class="form-horizontal iframe" role="form" id="view-prifile-form">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />姓名：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="name" readonly name="username"/>
		</div>
	  </div>
	  	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />学号：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="studentid" readonly value="" />
		</div>
	  </div>
	  	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />专业方向：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="specialty" value="" />
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />班级：</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control form-input" id="class" value="" />
		</div>
	  </div>
		<div class="control-group">
          <div class="controls">
            <button class="btn btn-success" id="b2">提交</button>
          </div>
        </div>
   </div>
  </div>
</div>
<div class="container prifile-div">  	
	<div class="form-horizontal iframe" role="form" id="change-password-form">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />原密码：</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control form-input" id="old-password" />
		</div>
	  </div>
	  	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />新密码：</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control form-input" id="new-password" />
		</div>
	  </div>
	  	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" />确认密码：</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control form-input" id="repassword" />
		</div>
	  </div>
	  <div class="control-group">
          <div class="controls">
            <button class="btn btn-success" id="b3">提交</button>
          </div>
        </div>
	</div>
</div>
<iframe src="__APP__/Viewimp/index" class="iframe" id="view-impression-form" frameborder="0"></iframe>
<iframe src="__APP__/Thome/student" class="iframe" id="view-record-form" frameborder="0"></iframe>
</body>
</html>