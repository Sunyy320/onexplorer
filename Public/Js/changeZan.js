// JavaScript Document

window.onload=function()
{
/*1.导航条取元素部分*/
	var secondPart=document.getElementById('secondPart');
	var scnd_ul=document.getElementById('scnd_ul');
	var scnd_li=scnd_ul.getElementsByTagName('li');
	
/*赞标志的改变*/
	var third_two=document.getElementById('third_two');
	var changZan=getByClass(third_two,'tdtoL_intro_zan')[0];
	
	changZan.onmouseover=function()
	{
		this.children[0].setAttribute('src','pictureJing/zanhou.png');
	}
	changZan.onmouseout=function()
	{
		this.children[0].setAttribute('src','pictureJing/zanqian.png');
	}
	
	
/*1.导航条鼠标移动改变部分*/	
	scnd_li[0].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/shouyeTwo.jpg')
	}
	scnd_li[0].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/shouye.jpg')
	}
	
	scnd_li[1].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/lejiaoliuTwo.jpg')
	}
	scnd_li[1].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/lejiaoliu.jpg')
	}
	
	scnd_li[2].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/gonglvTwo.jpg')
	}
	scnd_li[2].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/gonglv.jpg')
	}
	
	scnd_li[3].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/luntanTwo.jpg')
	}
	scnd_li[3].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/luntan.jpg')
	}
	
	scnd_li[4].onmouseover=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/qitaTwo.jpg')
	}
	scnd_li[4].onmouseout=function()
	{
		this.children[0].children[0].setAttribute('src','pictureJing/qita.jpg')
	}
}