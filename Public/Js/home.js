//对手风琴菜单的异步显示控制
$(function(){
	var arr=['change-password','view-prifile','comment','view-impression','view-record'];
	$('.home-a1').click(function(){
		var num=$(this).attr('id');
		//console.log(num);
		for(var i in arr){
			if(arr[i]!=num){
				$('#'+arr[i]+'-form').hide();
			}
			else{
				$('#'+arr[i]+'-form').show();
			}
			//console.log(arr[i]);
		}
	});
	/* $('#comment').click(function(){
		$('#3-form').show();
	}); */
})