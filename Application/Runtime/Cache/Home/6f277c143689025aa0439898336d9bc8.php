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


<title>Onexplorer探索者乐交流</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/lejiaoliu.css" />


<!--thirdPart中tdto是third_two（第三大部分中的第二部分）的缩写，L代表left，R代表right；第二部分中的lastBedding是指最后的铺垫，可调节其高度来保证<img>的渐变图片与背景契合。-->
<div id="thirdPart">
    <div class="line"></div>
    <img class="back_hai" src="/Public/Images/common/hai.jpg">
    <div class="line"></div>
    <img class="back_hai" src="/Public/Images/common/hai.jpg">
    <div id="third_one">
        <div class="third_one_left"><img src="/Public/Images/common/logoLe.png"></div>
        <div class="third_one_leftsmall"><a href="/Home/happy/addarticle"><img src="/Public/Images/common/leLogoSmall.png"></a></div>
        <div class="third_one_right">
            <input class="tdoneR_text" type="text" placeholder="请输入目的地搜索相应文章">
            <input class="tdoneR_submit" type="submit" value="">
        </div>
    </div>


    <div id="third_two">
        <!--third_two_left:为乐交流的合集部分，此页旅游攻略的数目是可以再加的，只需复制一个大的<li></li>即可，页面的高度可随内容的增多而变高。而简介旅游攻略部分中的主题（标题）为一行，简介为两行。-->
        <div class="third_two_left" >
            <ul class="tdtoL_intro" >

                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <div class="tdtoL_intro_title"><div><a><?php echo ($vo["title"]); ?></a></div></div>

                    <div class="tdtoL_intro_author">
                        <span>作者:<?php echo ($vo["username"]); ?></span>
                        <span>目的地:<?php echo ($vo["address"]); ?></span>
                        <span>点赞数:<?php echo ($vo["supportsum"]); ?></span>
                        <span><?php echo ($vo["titletime"]); ?></span>
                    </div>

                    <ul class="tdtoL_intro_pic">

                       <?php if(is_array($vo['images'])): $i = 0; $__LIST__ = $vo['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($val); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>

                    <div class="tdtoL_intro_content"><?php echo ($vo["shortcontent"]); ?>.......
                        <span><a href="<?php echo U('happy/showcnt');?>?id=<?php echo ($vo["id"]); ?>&name=<?php echo ($vo["username"]); ?>">更多+</a></span>
                    </div>

                    <div class="tdtoL_intro_line"></div>
                 </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>

            <div class="pagelist"><?php echo ($page); ?></div>

            <div class="tdtoL_intro_tail"></div>
        </div>






        <div class="third_two_right">
            <ul>
                <div><span>热门分享</span></div>

                <?php if(is_array($dianz)): $i = 0; $__LIST__ = $dianz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('happy/showcnt');?>?id=<?php echo ($val["id"]); ?>&name=<?php echo ($val["username"]); ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <div class="bedding"></div>
            <ul>
                <div><span>最新交流</span></div>
                 <?php if(is_array($tuij)): $i = 0; $__LIST__ = $tuij;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('happy/showcnt');?>?id=<?php echo ($val["id"]); ?>&name=<?php echo ($val["username"]); ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <!--<div class="bedding"></div>-->
            <!--<ul>-->
                <!--<div><span>热门组团</span></div>-->
                <!--<li>衡山快捷路线......</li>-->
                <!--<li>张家界完美游戏攻略......</li>-->
                <!--<li>你不知道的世界窗......</li>-->
                <!--<li>那些让你忘了拍照......</li>-->
            <!--</ul>-->

            <div class="lastBedding"></div>
            <img src="/Public/Images/common/Image 11_1.png">

        </div>
    </div>

</div>



<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>