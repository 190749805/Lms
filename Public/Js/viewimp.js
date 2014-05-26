//显示所有人的看法的界面
$(function(){
	$('#view-impression').show();
})

//获取所有发表的内容
function getContent(data) {
	var addr=window.location.href;
	var m;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address=addr.substr(0,m)+'index.php/Viewrecord/download';
	var str1="";
	var str2="";
	var arr=new Array();
	if(data!=null){
		for( var i=0;i<data.length;i++){
			var m=i+1;
			var str3='<div class="color-div">'+m+'.'+data[i].name+'&nbsp;&nbsp;&nbsp;&nbsp;'+data[i].filetime+'&nbsp;&nbsp;<br/>'+
					data[i].impression+'<br/>'+data[i].filename+'-'+ data[i].username+'</div>评论:<br/><span class="span-p'+data[i].id+'"></span>';
			arr=data[i].comment;
			//console.log(arr);
			if(arr!=null){
				for(var j=0;j<arr.length;j++){
					var str4='<ul><li><span class="span-p">'+arr[j].content+'---'+arr[j].name+'</span></li></ul>';
					str1+=str4;
				}
			}else {
				str1="";
			}
			var str5='<div id="div-input-view'+data[i].id+'" style="display:none;">'+
						'<input type="text" id="input-'+data[i].id+'" class="form-control input-view  input-text3" placeholder="请输入你的看法">'+
						'<button class="btn btn-success a-a2" name="'+data[i].id+'" id="view-que'+data[i].id+'">确认</button><br/>'+
					'</div>'+
					'<a name="'+data[i].id+'" class="a-praise a-pra">赞</a><span id="span-id'+data[i].id+'">'+data[i].number+'</span><br/>'+
					'<a class="btn " href="'+address+'?id='+data[i].id+'" value="'+data[i].id+'" id="a1">下载</a>'+
					'<a class="btn   a-a3" href="#" name="'+data[i].id+'" id="a3">评论</a></li></ul>';
			str2+=str3+str1+str5;
			str1="";
		}
	}else{
		str2='暂时还没有记录';
	}
	return str2;
}
//显示发表的内容
function show(data){
	$('#show-text').html(getContent(data)+'<br/><button type="button" class="btn btn-primary" data-toggle="button" id="sy">上一页</button>'+
	'<button type="button" class="btn btn-primary" data-toggle="button" id="xy">下一页</button>');
}
//按需求触发查找的相应的内容
$(function(){
	var addr=window.location.href;
	var m;
	var current_page=1;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address1=addr.substr(0,m)+'index.php/Viewimp/day';
	var jid;
	var num=0;
	$('a.li-a').click(function(){
		current_page=1;
		jid=this.id;
		//alert(jid);
		$.post(address1,{id:jid,page:current_page},function(data){
			var arr=JSON.parse(data);
			if(arr[0]){
				//console.log(arr[1]);
				num=arr[1];
				show(arr[0]);
			}else{
				$('#show-text').html('没有记录');
			}
		});
	});
	//异步下一页原理
	$(document).on("click","#xy",function(){
		if(current_page>=num){
			$('#xy').attr('disabled');
		}else{
			current_page++;
			$.post(address1,{id:jid,page:current_page},function(data){
				var arr=JSON.parse(data);
				if(arr[0]){
					//console.log(arr[2]);
					show(arr[0]);
				}else{
					$('#show-text').html('没有记录');
					
				}
			});
		}
	});
	//异步上一页原理
	$(document).on("click","#sy",function(){
		if(current_page<=1){
			$('#sy').attr('disabled');
		}else{
			current_page--;
			$.post(address1,{id:jid,page:current_page},function(data){
				var arr=JSON.parse(data);
				if(arr[0]){
				//console.log(arr[2]);
					show(arr[0]);
				}else{
					$('#show-text').html('没有记录');	
				}
			});
		}
	});
}) 


