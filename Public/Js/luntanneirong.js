function checked()
{
	var huifutext=document.getElementById("huifutext");
	if(huifutext.value=="")
	{
		alert("小主,还没有填写哦！");
		huifutext.focus();
		return false;
	}
	else
	{
		document.getElementById("huifutext1").value=huifutext.value;
		huifutext.value="";
		return true;
	}
}