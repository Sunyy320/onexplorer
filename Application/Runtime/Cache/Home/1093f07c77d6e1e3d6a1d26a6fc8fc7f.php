<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="/Public/Css/baseCss.css" />
    <script type="text/javascript" src="/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Js/lejiaoliu.js"></script>

    <script type="text/javascript">
        $(function(){

            //退出实现
            $("#loginout").click(function(){
                $.ajax({
                    type:"POST",
                    url:"<{U('login/loginout')}>",
                    success:function(){
                        $(".fst_head_two").html($("#notlogin").html());
                    }
                });
            });
        });
    </script>
</head>
<body>
<div id="notlogin" style="display: none">
    <a href="/Home/Login/index" >登陆</a>|
    <a href="/Home/Login/reg">注册</a>
</div>
<div id="firstPart">
    <!--滚动条+登陆+注册开始-->
    <div class="fst_head">
        <!--滚动条开始-->
        <div>
            <marquee  class="fst_head_one pointer"   direction="left" scrollamount="3"           onmouseover="this.stop()" onmouseout="this.start()">
                驴友圈是一个为大家提供欢乐、互交与旅游胜地的平台，大家快来畅所欲言吧。
            </marquee>
        </div>
        <!--滚动条结束-->

        <!--登陆注册开始-->
        <div class="fst_head_two">
            <?php if(session('username') == true): ?>欢迎您:<a href="<?php echo U('Userinfo/index');?>"><?php echo (session('username')); ?></a> |
                <a id="loginout">退出</a>
                <?php else: ?>
                <a href="<?php echo U('Login/index');?>" >登陆</a>|
                <a href="<?php echo U('Login/reg');?>">注册</a><?php endif; ?>
        </div>
        <!--登陆注册结束-->


    </div>
    <!--滚动条+登陆+注册结束-->

    <div class="fst_logo_search">
        <div class="fst_logo"><img src="/Public/Images/common/logo.png" style="width: 300px;height: 100px;"/> </div>
        <input class="fst_search_text" type="text" placeholder="请输入胜地名称">
        <input class="fst_search_submit" type="submit" value="">
    </div>
</div>

<div id="secondPart">
    <ul id="scnd_ul">
        <li><a href="<?php echo U('index/index');?>"><img src="/Public/Images/common/shouye.jpg"></a></li>
        <li><a href="<?php echo U('Happy/index');?>"><img src="/Public/Images/common/lejiaoliu.jpg"></a></li>
        <li><a href="<?php echo U('Strategy/index');?>"><img src="/Public/Images/common/gonglv.jpg"></a></li>
        <li><a href="<?php echo U('Topic/index');?>"><img src="/Public/Images/common/luntan.jpg"></a></li>
        <li><a href="<?php echo U('Tour/index');?>"><img src="/Public/Images/common/travelmate.jpg"></a></li>
    </ul>
</div>

<title>论坛首页</title>


<script src="/Public/Js/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/luntanshouye.css"/>
<script src="/Public/Js/luntanshouye.js"></script>
<!--中间部分-->
<div class="ltsy_zhongjianbufen1">
<div class="ltsy_zhongjianbufen2">
<div align="center" class="ltsy_zhongjianbufen3">
<span>热门活动</span>
</div>

<div class="ltsy_zhongjianbufen4">
<div class="ltsy_zhongjianbufen5">
<a href="#"><img id="luntanshouye_tupianqiehuan" src="/Public/Images/User/bianpicture/275346.jpg" style="width:100%;height:100%;"/></a>
</div>
<div class="ltsy_zhongjianbufen6">
<span style="color:blue;">></span>
<span><a href="#" class="luntanshouye_remenhuodonglink">武功山春游</a></span>
<div></div>
<span style="color:blue;">></span>
<span><a href="#" class="luntanshouye_remenhuodonglink">云中漫步</a></span>
<div></div>
<span style="color:blue;">></span>
<span><a href="#" class="luntanshouye_remenhuodonglink">侠士的沙行</a></span>

<div></div>
<span style="color:blue;">></span>
<span><a href="#" class="luntanshouye_remenhuodonglink">滚动的波涛</a></span>
<div></div>
<span style="color:blue;">></span>
<span><a href="#" class="luntanshouye_remenhuodonglink">滚动的波涛</a></span>
</div>
</div>

<div class="ltsy_tiezi1">
<span class="luntanshouye_konge2"></span><span>帖子</span>
</div>

<?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="luntanshouye_onmouse ltsy_tiezimokuai1">
<div class="ltsy_tiezimokuai2">
<div style="margin-bottom:8px;"><img src="/Public/Images/User/fixedpicture/ltxiaoxitubiao1.png" style="width:50px;height:25px;"/></div>
<span style="color:grey;font-size:12px;"><?php echo (date('Y-m-d H:i:s',$vo["posttime"])); ?></span>
</div>
<div class="ltsy_tiezimokuai3">
<span style="color:blue;"><a href="/Home/Post/index/tid/<?php echo ($vo["tid"]); ?>" class="luntanshouye_biaotilink"><?php echo ($vo["title"]); ?></a></span>
<div></div>
<span style="color:grey;font-size:12px;"></span>
</div>
<div class="ltsy_tiezimokuai4">
<span style="color:grey;font-size:12px;"><a href="#" class="luntanshouye_tiezhuxinxi" title="小帖主信息"><?php echo ($vo["uidname"]); ?></a></span>
<div style="margin-top:20px;"></div>
<span><a href="#" title="回复"><img src="/Public/Images/User/fixedpicture/gerenxinxi1.png" style="width:32px;height:20px;"/></a></span>
</div>
</div><?php endforeach; endif; ?>

<div class='pagelist'>
<?php echo ($show); ?>
</div>


<!-- 分页钮 -->
<!-- <div class="ltsy_fenyeniu1">
<button class="ltsy_fenyeniu2">下一页</button> 
</div>-->
<!-- 分页钮结束 -->

<div class="ltsy_fatietiao1">
<span class="luntanshouye_konge2"></span><span><a name="fatie"></a>发帖</span>
</div>

<form method="post" action="/Home/Topic/newpost" onsubmit="return checked()" id='topicform' >
 
<div class="ltsy_fatie1">
<span class="luntanshouye_konge2"></span>
<span>标题</span>
<input type="text" name="title" id="title" class="ltsy_fatie2"/>
<!--  <input type="text" name="biaoti1" id="bioati1" class="ltsy_fatie3"/>-->
</div>
	
<div class="ltsy_fatie4">
<textarea name='content' id="content" class="ltsy_fatie5"></textarea>
<!-- <textarea id="fatie1" class="ltsy_fatie6"></textarea>-->
</div>


<div class="ltsy_fatie7">
<input type="button" onclick='submitForm()' value="发帖" class="ltsy_fatie8"/>
</div>
</form>

</div>
<div class="ltsy_youbian1">
<a href="#fatie" class="luntanshouye_fatielink">
<div align="center" class="ltsy_youbian2">
<span>发布帖子</span>
</div>
</a>

</div>
</div>
<!-- 中间部分结束 -->


<script>
	
function submitForm()
{

	document.getElementById('topicform').submit();
}

</script>





<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>