$(function(){
	$('#b1').click(function(){
		var $username=$('#inputname').val();
		var $password=$('#inputpassword').val();
		var $radio=$('input:radio[name="status"]:checked').val();
		//alert($password.length);
		//console.log($username+$password);

		 if($username==''){
			alert('用户名不能为空！');
			return false;
		}else if($password=='' || $password.length<6){
			alert("密码不为空或者低于六位");
			return false;
		}else if(!$radio){
			alert('请选择教师或者学生!');
			return false;
		}else{
			var addr = window.location.href;
			//alert(addr);
			var m;
			if(addr.search(/index.php/) != -1)
			{	
				m=addr.search(/index.php/);
			}else{
				m=addr.length;
			}
			var address=addr.substr(0,m)+'index.php/Index/login'; 
				//alert(address);
				console.log($radio);
				$.post(address,{username:$username,password:$password,status:$radio},function(data){
						if(!data)
						{
							alert('用户名或者密码不正确');
							$('#inputpassword').val("");
							return false;
						}else{
							//alert(data.data);
							if(data[0].status==1){
							    window.location.href=addr.substr(0,m)+"index.php/Thome/index";
							}else{
								window.location.href=addr.substr(0,m)+"index.php/Home/index";
							}
						}
						//window.location.href="whidv";
					});
		}
		
	});
})