//上传文件
$(function(){  
	var addr = window.location.href;
	var m;
	if(addr.search(/index.php/) != -1)
	{	
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address=addr.substr(0,m)+'index.php/Home/upload'; 
	$("#b5").click(function(){     
		 //加载图标   
		 /* $("#loading").ajaxStart(function(){
			$(this).show();
		 }).ajaxComplete(function(){
			$(this).hide();
		 });*/
		  //上传文件
		var a=$('#textarea').val(); //接收发表的感想
		if(!$('#fileToUpload').val() && a=='')
		{
			alert('请上传文件或者发表感想');
			return false;
		}
		var data = {impression:a}; 
		$.ajaxFileUpload({
			url: address,//处理图片脚本
			secureuri :false,
			fileElementId :'fileToUpload',//file控件id
			data: data,
			dataType : 'json',
			success : function (data){
				if(data==1){
					alert('上传成功');
					window.location.reload();
				}else{
					alert('上传失败');
					return false;
				}
				return;
			}, 
			error: function(data){
				var n=JSON.parse(data['responseText']);
				alert(n);
			}
			/* function(data){
				if(data==1){
					alert('上传成功');
					window.location.reload();
				}else if(data==2){
					alser('亲，你还没有登录');
					return false;
				}else{
					alert('上传失败');
				}
			} */
			
		});
		return false; 
	});

})

