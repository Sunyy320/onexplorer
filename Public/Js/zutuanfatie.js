
function myFunction1(y)
{
  var str=y.value;
  var patt=new RegExp(/[0-9][0-9][0-9][0-9]\.[0-9][0-9]\.[0-9][0-9]/);
  var result=patt.test(str);
  if(result){}
  else
  {
	  y.value="";
	  alert("请注意日期的格式或者还没有填写");
  }
}
function myFunction2(y)
{
  var str=y.value;
  var patt=new RegExp(/[amp][m][0-9][0-9]\:[0-9][0-9]/);
  var result=patt.test(str);
  if(result){}
  else
  {
	  y.value="";
	  alert("请注意时间的格式或者还没有填写");
  }
}
function myFunction3(y)
{
  var str=y.value;
  var patt=new RegExp(/[0-9]+/);
  var result=patt.test(str);
  if(result){}
  else
  {
	  y.value="";
	  alert("请注意填数字或者还没有填写");
  }
}

function checked()
{
   var huodongbiaoti=document.getElementById("huodongbiaoti");
   if(huodongbiaoti.value==""||huodongbiaoti.value.length>15||huodongbiaoti.value.length<4)
   {
	   alert("活动标题为空或字数太多太少");
	   huodongbiaoti.focus();
	   return false;
   }
   var chufadidian=document.getElementById("chufadidian");
   if(chufadidian.value=="")
   {
       alert("出发地点不能为空");
	   chufadidian.focus();
	   return false;	   
   }
   var mudidi=document.getElementById("mudidi");
   if(mudidi.value=="")
   {
	   alert("目的地不能为空");
	   mudidi.focus();
	   return false;
   }
   var xczqkaishi=document.getElementById("xczqkaishi");
   if(xczqkaishi.value=="")
   {
	   alert("行程周期不能为空");
	   xczqkaishi.focus();
	   return false;
   }
      
   var xczqjieshu=document.getElementById("xczqjieshu");
   if(xczqjieshu.value=="")
   {
	   alert("行程周期不能为空");
	   xczqjieshu.focus();
	   return false;
   }
   
   var jiheshijian=document.getElementById("jiheshijian");
   if(jiheshijian.value=="")
   {
	   alert("集合时间不能为空");
	   jiheshijian.focus();
	   return false;
   }
   
   var renshu=document.getElementById("renshu");
   if(renshu.value=="")
   {
	   alert("人数不能为空");
	   renshu.focus();
	   return false;
   }
   
   var huodongshuoming=document.getElementById("huodongshuoming");
   if(huodongshuoming.value=="")
   {
	   alert("活动说明不能为空");
	   huodongshuoming.focus();
	   return false;
   }
   if((huodongshuoming.value!="")&&(renshu.value!="")&&(jiheshijian.value!="")&&(xczqjieshu.value!="")&&(xczqkaishi.value!="")&&(mudidi.value!="")&&(chufadidian.value!="")&&(huodongbiaoti.value!=""))
   {
	   document.getElementById("huodongshuoming1").value=huodongshuoming.value;
	   huodongshuoming.value="";
	   document.getElementById("renshu1").value=renshu.value;
	   renshu.value="";
	   document.getElementById("jiheshijian1").value=jiheshijian.value;
	   jiheshijian.value="";
	   document.getElementById("xczqjieshu1").value=xczqjieshu.value;
	   xczqjieshu.value="";
	   document.getElementById("xczqkaishi1").value=xczqkaishi.value;
	   xczqkaishi.value="";
	   document.getElementById("mudidi1").value=mudidi.value;
	   mudidi.value="";
	   document.getElementById("chufadidian1").value=chufadidian.value;
	   chufadidian.value="";
	   document.getElementById("huodongbiaoti1").value=huodongbiaoti.value;
	   huodongbiaoti.value="";
	   return true;
   }
}
