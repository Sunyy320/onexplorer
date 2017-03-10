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
    <a href="/index.php/Home/Login/index" >登陆</a>|
    <a href="/index.php/Home/Login/reg">注册</a>
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


<title>个人xinxi</title>
<script src="/Public/Js/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/gerenxinxi.css"/>
<script src="/Public/Js/gerenxinxi.js"></script>


<!--中间部分 -->
<div class="grxx_zhongjianbufen1">
<div class="grxx_zhongjianbufen2">
<div class="grxx_zhongjianbufen3">
<form method="post" action="" enctype="multipart/form-data">
<div class="grxx_zhongjianbufen4" id="preview">
<img id="imghead" src="/Public/Images/User/bianpicture/275785.jpg" class="grxx_zhongjianbufen5"/>
</div>
<span class="grxx_zhongjianbufen6">
<input type="file" name="file1" onchange="previewImage(this)" class="grxx_zhongjianbufen7"/></span>
<input type="submit" id="tupian_queren" name="tupian_queren" value="确认" class="grxx_zhongjianbufen8"/>
</form>
</div>
<div class="grxx_zhongjianbufen9">
<form method="post" action="" onsubmit="return checked2();">
<div>
<span class="gerenxinxi_xiugainichen grxx_zhongjianbufen10"><?php echo ($data[0]["uid"]); ?></span>
<span>
<input type="text" name="xiugainichen" id="xiugainichen" class="grxx_zhongjianbufen11"/>
<input type="submit" name="xiugainichen_queren" id="xiugainichen_queren" value="确认" class="grxx_zhongjianbufen12"/>
</span>
</div>
</form>
<form method="post" action="" onsubmit="return checked1();">
<div>
<span  class="gerenxinxi_xiugaimima grxx_zhongjianbufen13">修改密码</span>
<span><input type="text" name="xiugaimima" id="xiugaimima" class="grxx_zhongjianbufen14"/></span>
<span><input type="submit" name="xiugaimima_queren" id="xiugaimima_queren" value="确认" class="grxx_zhongjianbufen15"/></span>
</div>
</form>
<div class="grxx_zhongjianbufen16"><span style="color:red;">*</span><span>(点击昵称,修改密码或头像修改可修改相关资料)</span></div>
</div>
</div>


<div class="grxx_qiehuantiezi1">
<span class="gerenxinxi_xiaoshou gerenxinxi_tieziupon gerenxinxi_dianjitiezi1" style="background-color:#E8E8FF;">乐交流帖子</span>
<span class="gerenxinxi_konge"></span>
<span class="gerenxinxi_xiaoshou gerenxinxi_tieziupon gerenxinxi_dianjitiezi2">论坛帖子</span>
<span class="gerenxinxi_konge"></span>
<span class="gerenxinxi_xiaoshou gerenxinxi_tieziupon gerenxinxi_dianjitiezi3">组团帖子</span>
<span class="gerenxinxi_konge"></span>
</div>


<div class="grxx_zuobianbufen1">

<?php if(is_array($tourList)): foreach($tourList as $key=>$vo): ?><div class="gerenxinxi1_huodong">
<div class="grxx_zutuantiezi1">
<a href="#"><img height="100px" width="150px" src="/Public/Images/User/bianpicture/275785.jpg"/></a>
</div>
<div class="grxx_zutuantiezi2">
<div style="font-size:26px;"><a href="/index.php/Home/Group/index/tid/<?php echo ($vo["tid"]); ?>" class="gerenxinxi1_biaotilink"><?php echo ($vo["title"]); ?></a></div>
<div class="grxx_zutuantiezi3">
<span>目的地:</span>
<span><?php echo ($vo["destination"]); ?></span>
<span class="gerenxinxi_konge1"></span>
<span>出发时间:</span>
<span><?php echo ($vo["starttime"]); ?></span>
<span class="gerenxinxi_konge1"></span>
<span>结束时间:</span>
<span><?php echo ($vo["endtime"]); ?></span>
</div>
<div class="grxx_zutuantiezi4">
<span>人数:</span>
<span><?php echo ($vo["number"]); ?></span>
<span class="gerenxinxi_konge"></span>
<span class="gerenxinxi_konge"></span>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<a href="#"><img src="/Public/Images/User/fixedpicture/gerenxinxi1.png" title="进入回复" width="30px" height="15px"/></a>
<a href="#" class="gerenxinxi1_zuzhangxinxilink" title="组长个人信息"><span><?php echo ($vo["uidname"]); ?></span></a>
</div>
</div>
</div><?php endforeach; endif; ?>



<?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="gerenxinxi2_onmouse grxx_luntantiezi1">
<div class="grxx_luntantiezi2">
<div style="margin-bottom:8px;"><img src="/Public/Images/User/fixedpicture/ltxiaoxitubiao1.png" style="width:50px;height:25px;"/></div>
<span class="grxx_luntantiezi5"><?php echo (date('Y-m-d H:m:s',$vo["posttime"])); ?></span>
</div>
<div class="grxx_luntantiezi3">
<span style="color:blue;"><a href="/index.php/Home/Post/index/tid/<?php echo ($vo["tid"]); ?>" class="gerenxinxi2_biaotilink"><?php echo ($vo["title"]); ?></a></span>
<div></div>
<span class="grxx_luntantiezi5"><?php echo ($vo["content"]); ?></span>
</div>
<div class="grxx_luntantiezi4">
<span class="grxx_luntantiezi5"><a href="#" class="gerenxinxi2_tiezhuxinxi" title="小帖主信息"><?php echo ($vo["uid"]); ?></a></span>
<div style="margin-top:20px;"></div>
<span><a href="#" title="回复"><img src="/Public/Images/User/fixedpicture/gerenxinxi1.png" style="width:32px;height:20px;"/></a></span>
</div>
</div><?php endforeach; endif; ?>


<div class="gerenxinxi3_lejiaoliutiezi">
<div class="grxx_lejiaoliutiezi1"><span class="gerenxinxi_konge2"></span>
<a href="#" class="gerenxinxi3_biaotilink"><span>去哪儿旅游好一点？求大神推荐。。。。。。</span></a></div>
<div class="grxx_lejiaoliutiezi2"><span class="gerenxinxi_konge2"></span><span>偶然发现一篇不错的时刻表文，不敢独享，特转来 </span></div>
<div class="grxx_lejiaoliutiezi3"><span class="gerenxinxi_konge2"></span>
<span>作者:</span>
<span>brant</span>
<span class="gerenxinxi_konge"></span>
<span>浏览:</span>
<span>(</span>
<span>20</span>
<span>)</span>
<span class="gerenxinxi_konge"></span>
<span>2016-10-23</span>
<span class="gerenxinxi_konge"></span>
</div>
</div>



</div>
<div class="grxx_youbian1">
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