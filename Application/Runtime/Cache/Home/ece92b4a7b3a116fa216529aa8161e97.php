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


<title>帖子内容</title>
<script src="/Public/Js/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/luntanneirong.css"/>
<script src="/Public/Js/luntanneirong.js"></script>

<!--中间部分 -->

<div class="ltnr_zhongjianbufen1">
<div class="ltnr_zhongjianbufen2">
<div class="ltnr_zhongjianbufen3">
<span><a href="/Home/Topic/index" style="color:blue;">帖子</a>->详情</span>
</div>
<div class="ltnr_zhongjianbufen4">
</div>
<div class="ltnr_zhongjianbufen5">
<span><?php echo ($topicdata["title"]); ?></span>
</div>
<div class="ltnr_zhongjianbufen6">
<div class="ltnr_zhongjianbufen7">
<div style="margin-bottom:0px;"><span style="color:grey;">帖主</span></div>
<div align="center" class="ltnr_zhongjianbufen8">
<a href="#"><img src="/Public/Images/User/bianpicture/276282.jpg" style="width:86px;height:80px;"/></a></div>
<div align="center"><span><a href="#" style="color:blue;text-decoration:none;"><?php echo ($topicdata["uidname"]); ?></a></span></div>
<div align="center"><span style="color:grey;"><?php echo (date('Y-m-d H:i:s',$topicdata["posttime"])); ?></span></div>

</div>

<div class="ltnr_zhongjianbufen9">
<?php echo ($topicdata["content"]); ?>
</div>
</div>


<div class="ltnr_taoluntiao1">
<span>讨论</span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge"></span>
<span class="luntanneirong_konge2"></span>
<span class="luntanneirong_konge2"></span>
<span class="luntanneirong_konge2"></span>
<span><a href="#huifu" style="color:white;">回复</a></span>
</div>

<?php if(is_array($commentList)): foreach($commentList as $key=>$vo): ?><div class="ltnr_tiezihuifu1">
<div class="ltnr_tiezihuifu2">
<div align="center" class="ltnr_tiezihuifu3">
<a href="#"><img src="/Public/Images/User/bianpicture/275346.jpg" style="width:86px;height:80px;"/></a></div>
<div align="center"><span><a href="#" style="color:blue;text-decoration:none;"><?php echo ($vo["uid"]); ?></a></span></div>
<div align="center"><span style="color:grey;"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span></div>
</div>
<div class="ltnr_tiezihuifu4">
<?php echo ($vo["content"]); ?>
</div>
</div><?php endforeach; endif; ?>



<!-- 回复框 -->
<div class="ltnr_huifu1">
<span class="luntanneirong_konge2"></span><span>回复<a name="huifu"></a></span>
</div>

<form method="post" action="/Home/Comments/add" onsubmit="return checked()"> 
<div class="ltnr_huifu2">
<textarea id="huifutext" name='commentcontent' id='commentcontent' class="ltnr_huifu3"></textarea>
<!-- <textarea id="huifutext1" class="ltnr_huifu4"></textarea>-->

</div>
<div class="ltnr_huifu5">
<input type="hidden" name="tid" value="<?php echo ($topicdata["tid"]); ?>"/>
<input type="submit" name="submit" value="回复" class="ltnr_huifu6"/>
</div>
</form>
<!-- 回复框结束 -->

</div>
<div class="ltnr_youbian1">
</div>
</div>
<!-- 中间部分结束 -->

<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>