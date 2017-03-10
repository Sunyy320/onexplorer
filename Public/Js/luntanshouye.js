var arr=new Array();
arr[0]="../bianpicture/275346.jpg";
arr[1]="../bianpicture/275785.jpg";
arr[2]="../bianpicture/276280.jpg";
arr[3]="../bianpicture/276282.jpg";
arr[4]="../bianpicture/292277.jpg";
var num=0;
setInterval(myfunction,3000);
function myfunction()
{
	var tupianqiehuan=document.getElementById("luntanshouye_tupianqiehuan");
	if(num==arr.length-1)
	{
		num=0;
	}
    else
	{
		num+=1;
	}
	$("#luntanshouye_tupianqiehuan").attr("src",arr[num]);
	
}

function checked()
{
	var biaoti=document.getElementById("biaoti");
	var fatie=document.getElementById("fatie");
	if(biaoti.value=="")
	{
		alert("小主,还没有填写哦！");
		biaoti.focus();
		return false;
	}
	if(fatie.value=="")
	{
		alert("小主,还没有填写哦！");
		fatie.focus();
		return false;
	}
	if((fatie.value!="")&&(biaoti.value!=""))
	{
		document.getElementById("biaoti1").value=biaoti.value;
		biaoti.value="";
		document.getElementById("fatie1").value=fatie.value;
		fatie.value="";
		return true;
	}
}