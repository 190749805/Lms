//显示时间
function startTime()
{
	var today=new Date();
	var yy=today.getFullYear();
	var mm=today.getMonth()+1;
	var dd=today.getDate();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	// add a zero in front of numbers<10
	m=checkTime(m);
	s=checkTime(s);
	$('#time').text(yy+":"+mm+":"+dd+":"+h+":"+m+":"+s);
	t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
	if (i<10)
	  {
		i="0" + i;
	  }
	return i;
}