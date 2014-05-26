//注销用户
$(function(){
	$('#cancel').click(function(){
		//console.log($('#cancel').val());
		//alert($('#cancel').val()=='登录系统');
		var str=$.trim(document.getElementById("cancel").innerHTML);
		//alert(str);
		var addr = window.location.href;
			var m;
			if(addr.search(/index.php/) != -1)
			{	
				m=addr.search(/index.php/);
			}else{
				m=addr.length;
			}
			var address=addr.substr(0,m)+'index.php/Index/index'; 
		if(str=='登录系统'){
			window.location.href=address;
		}else{
			$.post('../Home/cancel',function(data){
				var m=JSON.parse(data);
				alert(m);
				window.location.href=address;
			});
		}
	});
})