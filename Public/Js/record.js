/* //查询自己的发表记录
$(function(){  
	//$('#comment-form').hide();
	//console.log("click");
	var addr = window.location.href;
	var m;
	if(addr.search(/index.php/) != -1)
	{	
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address=addr.substr(0,m)+'index.php/Viewrecord/select_file'; 
	$.get(address,function(data){				   
		 var num=JSON.parse(data);
		//console.log(data.status);
		//var num=data.data;
		for(var i in num){
			$('#iframe-div').append("<div>"+ num[i].impression+'<br/>'+
			num[i].filename+num[i].filetime+ 
			'<a class="btn btn-default" href="#" id="a1">下载</a>'+
			'<a class="btn btn-default" href="#" id="a2">修改</a>'+
			'<a class="btn btn-default" href="#" id="a3">评论</a>'+
			'<a class="btn btn-default" href="__URL__/remove?id="'+num[i].id+'"   id="a4">删除</a></div>');	
		 } 
		//$('#iframe-div').show();
	});

}) */

//查询自己的发表记录
$(function(){
	$('#view-record').click(function(){
		$('#iframe-div').show();
	});
})
//触发删除记录
/* $(function(){
	var num=$('#a4').attr('value');
		console.log(num);
		var m;
		var addr=window.location.href;
		if(addr.search(/index.php/)!=-1){
			m=addr.search(/index.php/);
		}else{
			m=addr.length;
		}
	$('#a4').click(function(){
		var address=addr.substr(0,m)+'index.php/Viewrecord/remove';
		$.post(address,{id:num},function(data){
			var data=JSON.parse(data);
			alert(data);
			window.location.reload();
		});
	});
	
	
}) */

//修改个人记录
$(function(){
	var m;
	var addr=window.location.href;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address1=addr.substr(0,m)+'index.php/Viewrecord/update';
	var address2=addr.substr(0,m)+'index.php/Viewrecord/index';
	$('#b9').click(function(){
		var $id=$('#hidden1').attr('value');
		var $content=$('#textarea-div').val();
		//console.log($id);
		
		$.post(address1,{id:$id,impression:$content},function(data){
			//var num=JSON.parse(data);
			//$('#textarea-div').val(num);
			//console.log(data);
			if(data==1){
				alert('修改成功');
				window.location.href=address2;
			}else{
				alert('修改失败');
			}
		});
	}); 
	
	//取消修改
	$('#b10').click(function(){
		window.location.href=address2;
	});
	
	//显示评论框
	/* $('.a-a3').click(function(){
		var $id=this.name;
		//alert($id);
		var m=$('#span-praise'+$id).after('<div class="input-group" id="div-input-view">'+
		'<input type="text" class="form-control input-view" placeholder="请输入你的看法"'+
		'name="view" id="view-input'+$id+'"><button class="btn btn-success">确认</button></div>');
		$('#view-input'+$id).focus();
		$('.input-view').blur(function(){
			$('#div-input-view').hide();
		});	
	}); */
	
	//显示评论框
	$(document).on("click",".a-a3",function(){
		 window.id=this.name;
		//alert(id);
		if(id==""){
			alert('亲，你还没有登录');
		}else{
			$('#div-input-view'+id).show();
			$('#input-'+id).focus();
		}
	});
	//保存评论并显示出来
	$(document).on("click",".a-a2",function(){
		var $id=this.name;
		var $content=$('#input-'+$id).val();
		if($content==''){
			alert('你没有发表任何评论');
			return false;
		}else{
			var address3=addr.substr(0,m)+'index.php/Viewrecord/comment';
			$.post(address3,{id:$id,content:$content},function(data){
				if(data){
					var m=JSON.parse(data);
					if(m==0){
						alert('你还没有填写你的名字');
						return false;
					}else{
						alert('评论成功');
						var m=JSON.parse(data);
						$('.span-p'+$id).append('<ul><li>'+m['content']+'---'+m['name']+'</li></ul>');
						//console.log(m['content']);
						//window.location.reload();
					}
					
				}else{
					alert('评论失败');
				}
			});
		}		
	});
	
	//赞的添加
	var address3=addr.substr(0,m)+'index.php/Viewrecord/praise'
	$(document).on("click",".a-praise",function(){
		var $id=this.name;
		//console.log($id);
		$.post(address3,{id:$id},function(data){
			var m=JSON.parse(data);
			if(m==0){
				alert('你已经点过赞了');
			}else if(m==-1){
				alert('点赞失败');
			}else{
				//alert('');
				$('#span-id'+$id).text(m);
			}
		});
	});
})



