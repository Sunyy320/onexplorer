// JavaScript Document
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
















