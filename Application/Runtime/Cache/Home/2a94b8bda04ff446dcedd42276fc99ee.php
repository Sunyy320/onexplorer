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

<link rel="stylesheet" type="text/css" href="/Public/Css/homePage.css" />


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


<div id="HP_thirdPart">
    <div class="HP_line"></div>
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

        <!--轮播图片开始-->
        <div id="banner_list">
            <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo ($val["url"]); ?>" target="_blank">
                    <img src="<?php echo ($val["pic"]); ?>" title="<?php echo ($val["title"]); ?>"  alt="<?php echo ($val["title"]); ?>"/>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--轮播图片结束-->
    </div>
    <!---------------------->



    <div id="HP_homePageAll">

        <!--旅游攻略开始-->
        <div class="HP_recommendName">攻略赏析</div>
        <div class="HP_homeRecommend">
                <?php if(is_array($strategy)): $i = 0; $__LIST__ = $strategy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="HP_recommendContent">
                        <img src="<?php echo ($val["imgsrc"]); ?>">
                        <a href="<?php echo U('Strategy/showct');?>?id=<?php echo ($val["id"]); ?>&name=<?php echo ($val["username"]); ?>">
                            <div class="HP_recommendTitle"><?php echo ($val["longtitle"]); ?></div>
                            <div class="HP_recommendIntro"><?php echo ($val["shortcontent"]); ?>......</div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--旅游攻略结束-->





        <!--热门话题开始-->
        <div class="HP_recommendName">热门话题</div>
        <div class="HP_reomendTopic">
            <img src="/Public/Images/common/homeTopicPicture.jpg">
            <div class="HP_topicUl">
                <ul>
                    <div class="HP_topicUlName">热门论坛</div>
                    <?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Post/index');?>?tid=<?php echo ($val["tid"]); ?>">
                            <span >.</span>&nbsp;<?php echo ($val["title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>


            <div class="HP_topicUl">
                <ul>
                    <div class="HP_topicUlName">一起团游</div>
                    <?php if(is_array($tour)): $i = 0; $__LIST__ = $tour;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Group/index');?>?tid=<?php echo ($val["tid"]); ?>">
                            <span >.</span>&nbsp;<?php echo ($val["title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--热门话题结束-->





        <!--乐交流开始-->
        <div class="HP_recommendName">乐乐交流</div>
        <div class="HP_recommendExchange">
            <?php if(is_array($happy)): $i = 0; $__LIST__ = $happy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="HP_exchangeContent">
                <img src="<?php echo ($val["imgsrc"]); ?>">
                <div class="HP_excahngeName">
                    <a href=""><?php echo ($val["title"]); ?></a>
                </div>
                <div class="HP_exchangeDing">
                    <div class="HP_exchangeDingLeft">顶</div>
                    <div class="HP_exchangeDingRight"><?php echo ($val["supportsum"]); ?></div>
                </div>
                <div class="HP_exchangeAuthor">By&nbsp;<?php echo ($val["username"]); ?></div>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <div class="HP_homePageAllTail"></div>
        <!--乐交流结束-->


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