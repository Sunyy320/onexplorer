// JavaScript Document
window.onload=function()
{
/*1.导航条取元素部分*/
	var secondPart=document.getElementById('secondPart');
	var scnd_ul=document.getElementById('scnd_ul');
	var scnd_li=scnd_ul.getElementsByTagName('li');

/*1.导航条鼠标移动改变部分*/	
	scnd_li[0].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/shouyeTwo.jpg')
	}
	scnd_li[0].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/shouye.jpg')
	}
	
	scnd_li[1].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/lejiaoliuTwo.jpg')
	}
	scnd_li[1].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/lejiaoliu.jpg')
	}
	
	scnd_li[2].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/gonglvTwo.jpg')
	}
	scnd_li[2].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/gonglv.jpg')
	}
	
	scnd_li[3].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/luntanTwo.jpg')
	}
	scnd_li[3].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/luntan.jpg')
	}
	
	scnd_li[4].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/travelmateTwo.jpg')
	}
	scnd_li[4].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','/public/Images/Common/travelmate.jpg')
	}
	
}















