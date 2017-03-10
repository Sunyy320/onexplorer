$(document).ready(function(){
	$(".gerenxinxi_xiugainichen").toggle(
	function(){
		$("#xiugainichen").css("border","1px solid #E8E8FF").show();
		$("#xiugainichen_queren").show();
	},
	function(){
		$("#xiugainichen").css("border","0px solid #E8E8FF").hide();
		$("#xiugainichen_queren").hide();
		
	});
	
});
$(document).ready(function(){
	$(".gerenxinxi_xiugaimima").toggle(
	function(){
		$("#xiugaimima").css("border","1px solid #E8E8FF").show();
		$("#xiugaimima_queren").show();
	},	
	function(){
		$("#xiugaimima").css("border","1px solid #E8E8FF").hide();
		$("#xiugaimima_queren").hide();
	}
	);
	
});
function checked2()
{
	var xiugainichen=document.getElementById("xiugainichen");
	if(xiugainichen.value.length>6)
	{
		alert("小主,昵称不能为空或者大于6哦！");
		xiugainichen.focus();
		return false;
	}
	if(xiugainichen.value=="")
	{
		alert("小主,昵称不能为空或者大于6哦！");
		xiugainichen.focus();
		return false;
		
	}
	$("#xiugainichen").hide();
	$("#xiugainichen_queren").hide();
	alert("恭喜小主，修改成功!");
	
}

function checked1()
{
	var xiugaimima=document.getElementById("xiugaimima");
	if((xiugaimima.value.length>16||xiugaimima.value.length<4)&&xiugaimima.value.length>0)
	{
		alert("小主，密码要小于等于16为，大于等于6位哦！");
		xiugaimima.focus();
		return false;
		
	}
	if(xiugaimima.value=="")
	{
		alert("小主，内容不能为空哦！");
		xiugaimima.focus();
		return false;
		
	}
	$("#xiugaimima").css("border","1px solid #E8E8FF").hide();
	$("#xiugaimima_queren").hide();
	alert("恭喜小主，修改成功");
}


        function previewImage(file)
        {
		  $("#tupian_queren").show();
          var MAXWIDTH  = 150; 
          var MAXHEIGHT = 150;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }


$(document).ready(function(){
	$(".gerenxinxi_dianjitiezi1").click(function(){
		$(".gerenxinxi_dianjitiezi1").css("background-color","#E8E8FF");
		$(".gerenxinxi_dianjitiezi2").css("background-color","#5398D9");
		$(".gerenxinxi_dianjitiezi3").css("background-color","#5398D9");
        $(".gerenxinxi1_huodong").hide();
        $(".gerenxinxi2_onmouse").hide();
 		$(".gerenxinxi3_lejiaoliutiezi").show();
	});
	$(".gerenxinxi_dianjitiezi2").click(function(){
		$(".gerenxinxi_dianjitiezi2").css("background-color","#E8E8FF");
		$(".gerenxinxi_dianjitiezi1").css("background-color","#5398D9");
		$(".gerenxinxi_dianjitiezi3").css("background-color","#5398D9");	
		$(".gerenxinxi1_huodong").hide();
        $(".gerenxinxi2_onmouse").show();
 		$(".gerenxinxi3_lejiaoliutiezi").hide();
	});
	$(".gerenxinxi_dianjitiezi3").click(function(){
		$(".gerenxinxi_dianjitiezi3").css("background-color","#E8E8FF");
		$(".gerenxinxi_dianjitiezi2").css("background-color","#5398D9");
		$(".gerenxinxi_dianjitiezi1").css("background-color","#5398D9");	
		$(".gerenxinxi1_huodong").show();
        $(".gerenxinxi2_onmouse").hide();
 		$(".gerenxinxi3_lejiaoliutiezi").hide();
	});
	
	
	
});