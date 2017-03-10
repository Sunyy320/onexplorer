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


<title>组团内容</title>
<script src="__PUBLIC/Js/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/zutuanneirong.css"/>
<script src="/Public/Js/zutuanneirong.js"></script>



<!-- 中间内容-->
<div class="ztnr_zhongjianneirong1">
<div class="ztnr_zhongjianneirong2"><span style="color:blue;font-size:15px;"><a href="#" class="zutuanneirong_zutuanlink">组团</a>->组团内容详情</span></div>
<!-- 中间左边 -->
<div class="ztnr_zhongjianzuobian1">
<div class="ztnr_zhongjianzuobian2">
<?php echo ($tourdata["title"]); ?>
</div>

<div class="ztnr_zhongjianzuobian3">
<div class="ztnr_zhongjianzuobian4">
<a href="#"><img src="/Public/Images/User/bianpicture/touxiang.png" width="60px" height="60px"/></a></div>
<div class="ztnr_zhongjianzuobian5">
<div style="color:blue;"><?php echo ($tourdata["uidname"]); ?></div>
<div style="color:blue;">
<span>发布日期:</span> 
<span><?php echo (date('Y-m-d',$tourdata["time"])); ?></span>
<span class="zutuanneirong_konge"></span><span class="zutuanneirong_konge"></span><span class="zutuanneirong_konge"></span><span class="zutuanneirong_konge"></span>
<span class="ztnr_zhongjianzuobian6">
<a style="text-decoration:none;" href="#zutuanneirong_huifumiao">回复</a></span> 
</div>
</div>
</div>

<!-- 中间行程简介 -->
<div class="ztnr_zhongjianxingchengjianjie1">

<div class="ztnr_zhongjianxingchengjianjie2">
<span>&nbsp;</span>
</div>

<div class="ztnr_zhongjianxingchengjianjie2">
<span style="color:red;">@</span>
<span style="color:grey;">出发地</span>
<span class="zutuanneirong_konge1"></span>
<span style="color:blue;"><?php echo ($tourdata["start"]); ?></span>
</div>

<div class="ztnr_zhongjianxingchengjianjie2">
<span style="color:red;">@</span>
<span style="color:grey;">目的地</span>
<span class="zutuanneirong_konge1"></span>
<span style="color:blue;"><?php echo ($tourdata["destination"]); ?></span>
</div>

<div class="ztnr_zhongjianxingchengjianjie2">
<span style="color:red;">@</span>
<span style="color:grey;">开始日期</span>
<span class="zutuanneirong_konge1"></span>
<span style="color:blue;"><?php echo ($tourdata["starttime"]); ?></span>
</div>

<div class="ztnr_zhongjianxingchengjianjie2">
<span style="color:red;">@</span>
<span style="color:grey;">结束日期</span>
<span class="zutuanneirong_konge1"></span>
<span style="color:blue;"><?php echo ($tourdata["endtime"]); ?></span>
</div>

</div>

<!-- 中间行程简介结束 -->


<!-- 组团内容 -->
<div class="ztnr_zutuanneirong1">
<span>组团内容详情：</span>
<?php echo ($tourdata["content"]); ?>
</div>
<!-- 组团内容结束 -->


<div class="ztnr_tanlunlianxi1">
<span class="zutuanneirong_konge2"></span><span>谈论联系</span>
</div>


<?php if(is_array($replyList)): foreach($replyList as $key=>$vo): ?><div class="ztnr_huifu1">
<div class="ztnr_huifu2">
<a href="#">
<img src="/Public/Images/User/bianpicture/275346.jpg" width="80px" height="75px"></a>
</div>
<div class="ztnr_huifu3">
<div style="color:blue;"><?php echo ($vo["uid"]); ?></div>
<div class="ztnr_huifu10"><?php echo (date('Y-m-d H:m:s',$vo["time"])); ?></div>
<div class="ztnr_huifu4">
<?php echo ($vo["content"]); ?>
</div>
</div>
</div><?php endforeach; endif; ?>



<div class="ztnr_huifu5">
<span class="zutuanneirong_konge2"></span><span>回复<a name="zutuanneirong_huifumiao"></a></span>
</div>

<form method="post" action="/Home/Reply/index" onsubmit="return checked()"> 
<div class="ztnr_huifu6">
<textarea name="content" id="content" class="ztnr_huifu7"></textarea>
<input type="hidden" name="tid" value="<?php echo ($tourdata["tid"]); ?>" >
</div>
<div class="ztnr_huifu9">
<input type="submit" name="submit" value="回复" style="width:200px;height:40px;background-color:#5B9BD5;color:white;font-size:20px;"/>
</div>
</form>

</div>
<!-- 中间左边结束 -->

<div class="ztnr_zhongjianzuobian">
</div>


</div>
<!-- 中间内容结束 -->





<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>