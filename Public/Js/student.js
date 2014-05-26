//显示添加学生的界面
$(function(){
	$('#student-b1').click(function(){
		$('#student-remove').html("");
		$('#student-add').show();
	});
})
//添加学生
$(function(){
	var addr=window.location.href;
	var m;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address1=addr.substr(0,m)+'index.php/Thome/add_student';
	$('#student-b3').click(function(){
		var $username=$('#username').val();
		var $name=$('#name').val();
		var $specialty=$('#specialty').val();
		var $class=$('#class').val();
		if($username=='' || $name==''){
			alert('学号和姓名必须填写');
			return false;
		}else if($username.length!=10 || isNaN($username)){
			alert('亲，学号只能是10位的数字');
			$('#username').val("");
			return false;	
		}else{
			//console.log('ffds');
			$.post(address1,{username:$username,name:$name,specialty:$specialty,class:$class},function(data){
				if(data==1){
					$('#username').val("");
					alert('添加成功');	
				}else if(data==2){
					$('#username').val("");
					alert('学号已经存在');
					return false;
				}else{
					alert('添加失败');
				}
			});
		}
	});
})
function getContent(data){
	var str="";
	var m=0;
	for(var i=0;i<data.length;i++){
		m=i+1;
		str+='<div id="div-remove'+data[i].id+'">'+m+'.'+data[i].name+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+data[i].username+'<a href="#" class="a-delete" id="'+data[i].id+'">删除</a><br/></div>';
	}
	return str;
}
function show(data){
	$('#student-remove').html(getContent(data)+'<br/><button type="button" class="btn btn-primary" data-toggle="button" id="sy1">上一页</button>'+
	'<button type="button" class="btn btn-primary" data-toggle="button" id="xy1">下一页</button>');
}
//删除学生
$(function(){
	//显示所有的学生
	var addr=window.location.href;
	var m;
	var num=0;
	var page_num=1;
	if(addr.search(/index.php/)!=-1){
		m=addr.search(/index.php/);
	}else{
		m=addr.length;
	}
	var address1=addr.substr(0,m)+'index.php/Thome/select_student';
	$('#student-b2').click(function(){
		$('#student-add').hide();
		page_num=1;
		$.post(address1,{page:page_num},function(data){
			var arr=JSON.parse(data);
			if(arr[0]){
				num=arr[1];
				show(arr[0]);
			}else{
				$('#student-remove').html('暂时没有学生');
			}
		});
	});
	//上一页
	$(document).on("click","#sy1",function(){
		if(page_num<=1){
			$('#sy1').attr('disabled');
		}else{
			page_num--;
			$.post(address1,{page:page_num},function(data){
				var arr=JSON.parse(data);
				if(arr[0]){
					show(arr[0]);
				}else{
					$('#student-remove').html('暂时没有学生');
				}
			});
		}
	})
	//下一页
	$(document).on("click","#xy1",function(){
		if(page_num>=num){
			$('#xy1').attr('disabled');
		}else{
			page_num++;
			$.post(address1,{page:page_num},function(data){
				var arr=JSON.parse(data);
				if(arr[0]){
					show(arr[0]);
				}else{
					$('#student-remove').html('暂时没有学生');
				}
			});
		}
	})
	//删除学生
	address2=addr.substr(0,m)+'index.php/Thome/remove_student';
	$(document).on("click",".a-delete",function(){
		var $id=this.id;
		$.post(address2,{id:$id},function(data){
			if(data==1){
				$.post(address1,{page:page_num},function(data){
					var arr=JSON.parse(data);
					if(arr[0]){
						num=arr[1];
						show(arr[0]);
					}else{
						$('#student-remove').html('暂时没有学生');
					}
				});
				alert('删除成功');
			}else{
				alert('删除失败');
				return false;
			}
		});
	});

})
