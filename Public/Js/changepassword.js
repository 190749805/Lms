//修改密码
$(function(){
	$('#b3').click(function(){
		var $oldPassword=$('#old-password').val();
		var $newPassword=$('#new-password').val();
		var $rePassword=$('#repassword').val();
		if($oldPassword=='' || $newPassword=='' || $rePassword=='')
		{
			alert('密码都不能为空');
			return false;
		}else if($newPassword.length<6 || $rePassword.length<6){
			alert('你输入的新密码不能少于六位');
			$('#old-password').val("");
			$('#new-password').val("");
			$('#repassword').val("");
			return false;
		}else if($oldPassword==$newPassword){
			alert('亲，原密码和新密码重复了');
			return false;
		}else{
			$.post('../Home/change_password',
			{
				oldpassword:$oldPassword,
				newpassword:$newPassword,
				repassword:$rePassword,
			},function(data){
				var m=JSON.parse(data);
				alert(m);
				$('#old-password').val('');
				$('#new-password').val('');
				$('#repassword').val('');
				//console.log(data);
			});
		}
		
	});
})