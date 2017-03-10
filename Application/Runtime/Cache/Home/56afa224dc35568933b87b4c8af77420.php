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

<title>发表旅游攻略页面</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/postArtic.css" />


<script type="text/javascript" charset="utf-8">
    window.UEDITOR_HOME_URL = "/Public/Ueditor/";
    $(document).ready(function () {
        //UE.getEditor('editor');
        var editor;
        var options = {
            initialFrameWidth:795,        //初化宽度
            initialFrameHeight:600,        //初化高度
            focus:false,                 //初始化时，是否让编辑器获得焦点true或false
            maximumWords:1000,            //允许的最大字符数
            toolbars:[
                [ 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontsize', 'fontfamily', 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'removeformat', 'formatmatch', 'autotypeset', 'pasteplain', '|', 'insertorderedlist', 'insertunorderedlist', 'cleardoc', 'link', 'unlink','insertimage','paragraph','addparagraph']
            ],
            enableAutoSave: false,
            wordCount:false,         //是否开启字数统计
            enableContextMenu: false,   //是否开启右击快捷方式
            paragraph:{'p':'','h2':''},//标题设置
            scaleEnabled:true,//文本框是否可以自动增长，设置为true，不可以，形成滚动条
        };
        editor = new UE.ui.Editor(options);
        editor.render("editor");

        //发布内容
        $("#add_submit").click(function(){
            var username="<?php echo (session('username')); ?>";
            if(!$(".add_title").val()||!$(".add_address").val()||!$("#editor").html()){
                alert("有内容未填写");
            }else if(username==null||username==""){
                alert(" 请先登录！");
            }else{
                $("#MyForm").submit();
            }
        });
    });

</script>
<script type="text/javascript" src="/Public/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Ueditor/ueditor.all.min.js"></script>




<div id="PA_thirdPart">
    <div class="PA_line"></div>
    <img class="PA_back_hai" src="/Public/Images/common/hai.jpg">

</div>


<div id="PA_pageArtiv_all">
    <form  id='MyForm' method='POST' action="/Home/Strategypost/add">
        <div class="PA_pgat_zhuti">
            <div><img src="/Public/Images/common/postOne.jpg"></div>
            <input type="text" placeholder="给你的文章起一个好名字吧" name="longtitle" class="add_title">
        </div>

        <div class="PA_pgat_line"></div>


        <div class="PA_pgat_zhuti">
            <div><img src="/Public/Images/common/postFive.jpg"></div>
            <input type="text" placeholder="给你的文章起一个好名字吧" name="shortitle" class="add_title">
        </div>

        <div class="PA_pgat_line"></div>


        <div class="PA_pgat_place">
            <div><img src="/Public/Images/common/postTwo.jpg"></div>
            <input type="text" placeholder="请输入景点名" name="place" class="add_address">
        </div>

        <div class="PA_pgat_line"></div>

        <div class="PA_pgat_artic">
            <div><img src="/Public/Images/common/postThree.jpg"></div>
        </div>

        <!---------------------------------------------->
        <div class="container">
            <script id="editor" type="text/plain"  name="content"></script>
        </div>

    </form>
    <!----------------------------------------------->

    <div class="PA_pgat_post">
        <img src="/Public/Images/common/postFour.jpg" id="add_submit"/>
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