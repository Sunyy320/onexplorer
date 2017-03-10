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

<title>组团首页</title>
<script src="/Public/Js/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/zutuanshouye.css"/>
<script src="/Public/Js/zutuanshouye.js"></script>





<!-- 中间内容 -->
<div class="ztsy_zhongjianneirong1">
<!-- 中间左边 -->
<div class="ztsy_zhongjianneirong2">

<!-- 搜索切换活动-->
<form method="" action="">
<div class="ztsy_shousuoqiehuanhuodong1">
<span class="zutuanshouye_xiaoshou zutuanshouye_dianjiqiehuanbeijing22">组团活动</span>
<span class="zutuanshouye_konge"></span>
<span class="zutuanshouye_konge"></span>
<input type="text" name="soushuo" placeholder="目的地" class="ztsy_shousuoqiehuanhuodong2"/>
<button class="zutuanshouye_xiaoshou" class="ztsy_shousuoqiehuanhuodong3">搜索</button>
</div>
</form>
<!-- 搜索切换活动结束 -->

<?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="zutuanshouye_huodong">
<div class="ztsy_huodongmokuai1">
<a href="#"><img height="100px" width="150px" src="/Public/Images/User/bianpicture/275346.jpg"/></a>
</div>
<div class="ztsy_huodongmokuai2">
<div class="ztsy_huodongmokuai3"><a href="/Home/Group/index/tid/<?php echo ($vo["tid"]); ?>" class="zutuanshouye_biaotilink"><?php echo ($vo["title"]); ?></a></div>
<div class="ztsy_huodongmokuai4">
<span>目的地:</span>
<span><?php echo ($vo["destination"]); ?></span>
<span class="zutuanshouye_konge1"></span>
<span>出发时间:</span>
<span><?php echo ($vo["starttime"]); ?></span>
<span class="zutuanshouye_konge1"></span>
<span>结束时间:</span>
<span><?php echo ($vo["endtime"]); ?></span>
</div>
<div class="ztsy_huodongmokuai5">
<span>人数:</span>
<span><?php echo ($vo["number"]); ?></span>
<span class="zutuanshouye_konge"></span>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<span class="zutuanshouye_konge"></span>
<a href="#"><img src="/Public/Images/User/fixedpicture/gerenxinxi1.png" title="进入回复" width="30px" height="15px"/></a>
<a href="#" class="zutuanshouye_zuzhangxinxilink" title="组长个人信息"><span><?php echo ($vo["uidname"]); ?></span></a>
</div>
</div>
</div><?php endforeach; endif; ?>
</div>


<!-- 中间右边 -->
<div class="ztsy_zhongjianyoubian1">
<div align="center" class="ztsy_zhongjianyoubian2"><a href="/Home/Tour/add" class="zutuanshouye_fabulink">活动发布</a></div>
</div>
<!-- 中间右边结束 -->

</div>
<!-- 中间内容结束 -->

<!-- 分页栏 -->
<div class="pagelist">
<span><?php echo ($show); ?></span>
</div>



<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>