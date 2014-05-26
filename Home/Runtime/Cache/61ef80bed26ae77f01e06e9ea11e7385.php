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
<script src="__PUBLIC__/Js/comment.js"></script>
<script src="__PUBLIC__/Js/home.js"></script>
<script src="__PUBLIC__/Js/viewimp.js"></script>

</head>
<body>

<div class="container">
  <div class="form-horizontal" role="form" id="view-impression-form">
  <div id="div-tihui">
		
			<div class="btn-group">
		  <div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="b6">
			  天数查询
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
			  <li><a href="#" class="li-a aa" id="td" name="tdd">一天内</a></li>
			  <li><a href="#" class="li-a aa" id="yd" name="ydd">两天内</a></li>
			  <li><a href="#" class="li-a aa" id="fd" name="byd">三天内</a></li>
			  <li><a href="#" class="li-a aa" id="dd" name="ddd">三天以外</a></li>
			</ul>
		  </div>
		</div>
		
			<div class="btn-group">
		  <div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="b7">
			  按周查询
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
			  <li><a href="#" class="li-a aa" id="ow">一周内</a></li>
			  <li><a href="#" class="li-a aa" id="tw">两周内</a></li>
			  <li><a href="#" class="li-a aa" id="thw">三周内</a></li>
			  <li><a href="#" class="li-a aa" id="ww">三周以上</a></li>
			  
			</ul>
		  </div>
		</div>
		
			<div class="btn-group">
		  <div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="b8">
			  专业方向
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
			  <li><a href="#" class="li-a aa" id="php">php</a></li>
			  <li><a href="#" class="li-a aa" id="java">JavaWeb</a></li>
			  <li><a href="#" class="li-a aa" id="android">安卓</a></li>
			  <li><a href="#" class="li-a aa" id="embedded">嵌入式</a></li>
			  <li><a href="#" class="li-a aa" id="clipart">美工</a></li>
			  <li><a href="#" class="li-a aa" id="net">.NET</a></li>
			  <li><a href="#" class="li-a aa" id="ccc">C++</a></li>
			  <li><a href="#" class="li-a aa" id="other">其他</a></li>
			</ul>
		  </div>
		</div>
	</div>
	<div id="show-text" class="tihui">
		
	
	</div>
  </div>
</div>

</body>
</html>
<script src="__PUBLIC__/Js/record.js"></script>