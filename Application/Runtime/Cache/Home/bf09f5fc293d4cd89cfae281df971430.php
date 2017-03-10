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

<title>Onexplorer旅游攻略</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/travelStrategy.css" />
<script type="text/javascript" src="/Public/Js/tour.js"></script>

<!--照片轮播js开始-->
<script type="text/javascript">
    var t = n =0, count;
    $(document).ready(function(){
        count=$("#banner_list a").length;
        $("#banner_list a:not(:first-child)").hide();
        $("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
        $("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")});
        $("#banner li").click(function() {

            var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4
            n = i;
            if (i >= count) return;
            $("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
            $("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")});
            $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
            document.getElementById("banner").style.background="";
            $(this).toggleClass("on");
            $(this).siblings().removeAttr("class");
        });
        t = setInterval("showAuto()", 4000);
        $("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
    })

    function showAuto()
    {
        n = n >=(count -1) ?0 : ++n;
        $("#banner li").eq(n).trigger('click');

    }
</script>
<!--照片轮播js结束-->


<div id="TS_thirdPart">
    <div class="TS_line"></div>

    <!--图片轮播---------->
    <div id="banner">
        <div id="banner_bg"></div>
        <!--标题背景-->
        <div id="banner_info"></div>
        <!--标题-->
        <ul>
            <li class="on">1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
        <div id="banner_list">

            <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo ($val["url"]); ?>" target="_blank">
                    <img src="<?php echo ($val["pic"]); ?>" title="<?php echo ($val["title"]); ?>" alt="<?php echo ($val["title"]); ?>"/></a><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>
    <!---------------------->

    <!--主体内容-->
    <div id="TS_article">

        <!--左边推荐开始-->
        <div class="TS_articleLeft">
            <div class="TS_leftHeadAll">
                <img class="TS_leftHeadPicture" src="/Public/Images/common/leftHead.png">
                <div class="TS_leftHead">旅游攻略，懂你所需</div>
            </div>

            <!--按照点赞量进行推荐开始-->
            <div class="TS_LeftRecommendName">精品推荐</div>
            <ul class="TS_leftRecommend">

                <?php if(is_array($tuij)): $i = 0; $__LIST__ = $tuij;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Strategy/showct');?>?id=<?php echo ($val["id"]); ?>&name=<?php echo ($val["username"]); ?>"><?php echo ($val["longtitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <!--按照点赞量进行推荐结束-->

            <!--按时间顺利选出文章推荐开始-->
            <div class="TS_LeftRecommendName">最新出炉</div>
            <ul class="TS_leftRecommend">
                <?php if(is_array($last)): $i = 0; $__LIST__ = $last;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Strategy/showct');?>?id=<?php echo ($val["id"]); ?>&name=<?php echo ($val["username"]); ?>"><?php echo ($val["longtitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <!--按时间顺利选出文章推荐结束-->


            <!--导航条链接开始-->
            <div class="TS_LeftRecommendName">友情直通</div>
            <ul class="TS_leftRecommend">
                <li><a href="<?php echo U('Index/index');?>">再见首页</a></li>
                <li><a href="<?php echo U('Happy/index');?>">欢乐交流</a></li>
                <li><a href="<?php echo U('Topic/index');?>">踏上论坛</a></li>
                <li><a href="<?php echo U('Tour/index');?>">么么组队</a></li>
            </ul>
            <!--导航条链接结束-->


        </div>
        <!--左边推荐结束-->


        <!--右边内容开始-->
        <div class="TS_articleRight">
            <ul>
                <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <div class="TS_textPicture">
                            <a href="/Home/Strategy/showct?id=<?php echo ($vo["id"]); ?>&name=<?php echo ($vo["username"]); ?>">
                                <img src="<?php echo ($vo["imgsrc"]); ?>">
                            </a>
                        </div>

                        <div class="TS_textContent">
                            <div class="TS_textHead">
                                <a href="/Home/Strategy/showct?id=<?php echo ($vo["id"]); ?>&name=<?php echo ($vo["username"]); ?>" >
                                    【<?php echo ($vo["shortitle"]); ?>】<?php echo ($vo["longtitle"]); ?>
                                </a>
                            </div>

                            <div class="TS_textIntro">
                                <a href="/Home/Strategy/showct?id=<?php echo ($vo["id"]); ?>&name=<?php echo ($vo["username"]); ?>">
                                    <?php echo ($vo["shortcontent"]); ?>.......
                                </a>
                            </div>

                            <div class="TS_textInfor">
                                <img src="/Public/Images/common/dingwei.png">
                                <div class="TS_inforLocation"><?php echo ($vo["place"]); ?></div>
                                <div class="TS_inforAuthor">By&nbsp;<span><?php echo ($vo["username"]); ?></span></div>
                            </div>
                            <div class="TS_textDingnum"><?php echo ($vo["supportsum"]); ?>人</div>
                            <div class="TS_textDing">
                                <a href="/Home/Strategy/showct?id=<?php echo ($vo["id"]); ?>&name=<?php echo ($vo["username"]); ?>"><img src="/Public/Images/common/ding.png"></a>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>


            </ul>
            <div class="TS_rightPageNum"><div class="pagelist"><?php echo ($page); ?></div></div>
            <div class="TS_articleRightTail"></div>
        </div>
        <!--右边内容结束-->
    </div>
    <div id="TS_tail"></div>
</div>



<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>