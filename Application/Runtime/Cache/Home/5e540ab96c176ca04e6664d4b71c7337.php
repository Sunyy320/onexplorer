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
                    url:"/Home/Login/loginout",
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
            <?php if(session('username') == true): ?>欢迎您:<a href="/Home/Userinfo/index"><?php echo (session('username')); ?></a> |
                <a id="loginout">退出</a>
                <?php else: ?>
                <a href="/Home/Login/index" >登陆</a>|
                <a href="/Home/Login/reg">注册</a><?php endif; ?>
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
        <li>
            <a href="/Home/Index/index">
                <img src="/Public/Images/common/shouye.jpg">
            </a>
        </li>

        <li>
            <a href="/Home/Happy/index">
                <img src="/Public/Images/common/lejiaoliu.jpg">
            </a>
        </li>

        <li>
            <a href="/Home/Strategy/index">
                <img src="/Public/Images/common/gonglv.jpg">
            </a>
        </li>

        <li>
            <a href="/Home/Topic/index">
                <img src="/Public/Images/common/luntan.jpg">
            </a>
        </li>

        <li>
            <a href="/Home/Tour/index">
                <img src="/Public/Images/common/travelmate.jpg">
            </a>
        </li>

    </ul>
</div>

<title>Onexplorer探索者乐交流文章详细</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/introTS.css" />
<script type="text/javascript" src="/Public/Js/move.js"></script>


<div id="thirdPart">
    <div class="line"></div>
    <img class="back_hai" src="/Public/Images/common/hai.jpg">
    <div class="line"></div>
    <img class="back_hai" src="/Public/Images/common/hai.jpg">
    <div id="third_one">
        <div class="third_one_left"><img src="/Public/Images/common/logoLe.png"></div>
        <div class="third_one_leftsmall"><a><img src="/Public/Images/common/leLogoSmall.png"></a></div>
        <div class="third_one_right">
            <input class="tdoneR_text" type="text" placeholder="请输入目的地搜索相应文章">
            <input class="tdoneR_submit" type="submit" value="">
        </div>
    </div>



    <div id="third_two">
        <div class="third_two_left">
            <div class="tdtoL_intro">

                <div class="tdtoL_intro_title"><?php echo ($arr["title"]); ?></div>

                <div class="tdtoL_intro_author">
                    <span>作者：<?php echo ($arr["username"]); ?></span>
                    <span>目的地：<?php echo ($arr["address"]); ?></span>
                    <span id="dzcount">点赞数：<?php echo ($arr["supportsum"]); ?></span>
                    <span><?php echo ($arr["titletime"]); ?></span>
                </div>


                <div class="tdtoL_intro_text">
                   <?php echo ($arr["content"]); ?>
                </div>


            </div>

            <div class="tdtoL_intro_zan"><img src="/Public/Images/common/zanqian.png" id="dianzan"></div>
            <div class="tdtoL_statement">-----注：资源来自乐交流模块、百度百科及网络-----</div>
        </div>

     </div>

</div>
<script type="text/javascript">
    $(function(){
        //点赞，更新数据，点赞数+1，ajax实现
       $("#dianzan").click(function(){
           $.ajax({
               type:"POST",
               data:"id=<?php echo ($arr["id"]); ?>",
               url:"/Home/happy/dianzan",
               success:function(msg){
                   var num=<?php echo ($arr["supportsum"]); ?>+1;
                   $("#dzcount").html("点赞数:"+num);
                   alert(msg);
               }
           });
       });
    });
</script>


<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>