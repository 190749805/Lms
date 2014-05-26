$(function(){
	var addr=window.location.href;
	var m;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	
	//控制显示查询资料
	$('#view-prifile').click(function(){
		var address=addr.substr(0,m)+"index.php/Home/select_user";
		$.get(address,function(data){
			var data=JSON.parse(data);
			//console.log(data);
			var name=data[0].name;
			var username=data[0].username;
			var $class=data[0].class;
			var specialty=data[0].specialty;
			$('#name').val(name);
			$('#studentid').val(username);
			//$('#studentid').css.disabled;
			$('#class').val($class);
			$('#specialty').val(specialty);
		});
	});
	
	//控制修改资料
	$('#b2').click(function(){
		var address=addr.substr(0,m)+"index.php/Home/update_prifile";
		//alert(address);
		var $name=$('#name').val();
		//var studentid=$('#studentid').val();
		var $class=$('#class').val();
		var $specialty=$('#specialty').val();
		if($name=='' || $class=='' || $specialty==''){
			alert('你所提交的信息不能为空');
			return false;
		}else if(!$name || !$class || !$specialty){
			alert('你没有修改任何内容');
			return false;
		}else{
			$.post(address,{name:$name,class:$class,specialty:$specialty},function(data){
				if(!data){
					alert('修改失败');
				}else{
					alert('修改成功');
					var name=JSON.parse(data).name;
					//var studentid=JSON.parse(data).studentid;
					var $class=JSON.parse(data).class;
					var specialty=JSON.parse(data).specialty;
					
				}
			});
		}
	});
	
})
