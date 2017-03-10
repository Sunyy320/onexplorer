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

<title>Onexplorer旅游攻略详细页面</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/travelStrategyDetails.css" />
<script type="text/javascript" src="/Public/Js/zUI.js"></script>
<script type="text/javascript" src="/Public/Js/travelStrategyDetails.js"></script>



<div id="TSD_thirdPart">
    <div class="TSD_line"></div>
    <div id="TSD_article">

        <!--文章左边开始-->
        <div class="TSD_articleLeft">
            <ul>
                <!--标题开始-->
                <div class="TSD_articleNameAll">
                    <div class="TSD_articleName"><?php echo ($res["shortitle"]); ?>——<?php echo ($res["longtitle"]); ?></div>
                    <div class="TSD_articleAuthor">By:&nbsp;<span><?php echo ($res["username"]); ?></span>
                        <span>地点：<?php echo ($res["place"]); ?></span></div>
                    <div class="TSD_articleNamePicture"></div>
                </div>
                <!--标题结束-->

                <!--简介-->
                <li>
                    <div class="TSD_articleContent">
                         <?php echo ($res['artcontent_all'][0]); ?>
                    </div>
                </li>

                <?php if(is_array($res[artcontent_all])): $i = 0; $__LIST__ = array_slice($res[artcontent_all],1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <div class="TSD_articleTitle">
                        <div class="TSD_articleTitleName">
                            <a name="<?php echo ($i); ?>"><?php echo ($res['artitle_all'][$i-1]); ?></a></div>
                        <div class="TSD_articleTitleLine"></div>
                    </div>
                    <div class="TSD_articleContent">
                       <?php echo ($vo); ?>
                    </div>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>	

                <div class="TSD_articleEnd"><div>完结</div></div>
            </ul>

        </div>
        <!--文章左边结束-->

        <!--文章右边开始-->
        <div class="TSD_articleRight">
            <!--个人信息展示：头像，点赞数-->
            <div class="TSD_rightOne">

                <div class="TSD_rightOnePicture">
                    <img src="/Public/Images/common/panda.jpg">
                </div>

                <div class="TSD_rightOneDing">
                    <div class="TSD_rightOneUp"><?php echo ($res["supportsum"]); ?></div>
                    <div class="TSD_rightOneDown" id="dianzan">
                        <img src="/Public/Images/common/ding.png">
                    </div>
                </div>
            </div>

            <!--悬浮框-->
            <div id="TSD_rightTwo">
                <div class="TSD_rightTowMuneName">游记目录</div>

                <div id="ademo">
                    <div>

                       <?php if(is_array($res['artitle_all'])): $i = 0; $__LIST__ = $res['artitle_all'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="abox" ><a href="#<?php echo ($i); ?>">
                               <?php echo ($i); ?>/&nbsp;<?php echo ($vo); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>

            </div>
        </div>
        <!--文章右边结束-->
    </div>



    <div id="TSD_tail"></div>
</div>

<script type="text/javascript">
    $(function () {
        //点赞，更新数据，点赞数+1，ajax实现
        $("#dianzan").click(function () {
            $.ajax({
                type: "POST",
                data: "id=<?php echo ($res["id"]); ?>",
                url: "/Home/Strategy/dianzan",
                success: function (msg) {
                    var num = <?php echo ($res["supportsum"]); ?>+1;
                        $(".TSD_rightOneUp").html(num);
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