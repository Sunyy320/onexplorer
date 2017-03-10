// JavaScript Document
window.onload=function()
{

	window.onscroll=function()
	{
		var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
		var TSD_rightTwo=document.getElementById("TSD_rightTwo");
		var TSD_tail=document.getElementById("TSD_tail");
		var tail=document.getElementById("tail");
		var TSD_article=document.getElementById("TSD_article");
		var TSD_articleLeft=getByClass(TSD_article,'TSD_articleLeft')[0];
		var len=240+(TSD_articleLeft.offsetHeight-TSD_rightTwo.offsetHeight-100);
		if(scrollTop<222)
		{
			TSD_rightTwo.style.position='relative';
			TSD_rightTwo.style.top='0px';
			TSD_rightTwo.style.marginTop='0px';
		}
		else
		{
			if(scrollTop>222&&scrollTop<len)
			{
				TSD_rightTwo.style.position='fixed';
				TSD_rightTwo.style.top='100px';
				TSD_rightTwo.style.marginTop='0px';
			}
			else
			if(scrollTop>len)
			{
				TSD_rightTwo.style.position="relative";
				TSD_rightTwo.style.top='0px';
				TSD_rightTwo.style.marginTop=(len-240)+'px';
			}
		}



	}
	$(function(){
			$("#ademo").panel({iWheelStep:32});
		});
}
function getByClass(odj,stt)
{
	var result=[];
	var such=odj.getElementsByTagName('*');
	for(var i=0;i<such.length;i++)
	{
		if(such[i].className==stt)
		{
			result.push(such[i]);
		}
	}
	return result;
}














