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
                    url:"/index.php/Home/Login/loginout",
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
            <?php if(session('username') == true): ?>欢迎您:<a href="/index.php/Home/Userinfo/index"><?php echo (session('username')); ?></a> |
                <a id="loginout">退出</a>
                <?php else: ?>
                <a href="/index.php/Home/Login/index" >登陆</a>|
                <a href="/index.php/Home/Login/reg">注册</a><?php endif; ?>
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
        <li><a href="/index.php/Home/Index/index"><img src="/Public/Images/common/shouye.jpg"></a></li>
        <li><a href="/index.php/Home/Happy/index"><img src="/Public/Images/common/lejiaoliu.jpg"></a></li>
        <li><a href="/index.php/Home/Strategy/index"><img src="/Public/Images/common/gonglv.jpg"></a></li>
        <li><a href="/index.php/Home/Topic/index"><img src="/Public/Images/common/luntan.jpg"></a></li>
        <li><a href="/index.php/Home/Tour/index"><img src="/Public/Images/common/travelmate.jpg"></a></li>
    </ul>
</div>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Onexplorer探索者登陆注册页面</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/log.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript">
        $(function(){

            //提交实现
            $(".tijiao").click(function(){
                if(!$("#zhanghao").val()||!$("#mima").val()){
                    $("#err").show();
                    $("#err").html("用户名或密码不能为空");
                    return;
                }else if(!$("#cmima").val()||!$("#em").val()){
                    $("#err").show();
                    $("#err").html("确认密码或邮箱不能为空");
                    return;
                }else if($("#cmima").val()!=$("#mima").val()){
                    $("#err").show();
                    $("#err").html("密码和确定密码不一致");
                    return;
                }else{
                    $.ajax({
                        type:"POST",
                        url:"/index.php/Home/Login/checkreg",
                        data:"username="+$("#zhanghao").val()+"&password="+$("#mima").val()+"&password2="+$("#cmima").val()+"&email="+$("#em").val(),
                        success:function(msg){
                            if(msg!=""){
                                $("#err").show();
                                $("#err").html(msg);
                                return;
                            }else {
                                window.location.href="<?php echo (session('url')); ?>";
                            }

                        }
                    });
                }
            });
        });
    </script>
</head>
<body>

<!--最上面的脚步字样-->
<div id="log_first"><img src="/Public/Images/common/17.png"/></div>


<!--中间的这部分-->
<div id="log_center">

    <div id="log_center_back">
        <!--注册框-->
        <div id="denglukuang2">

            <!--用户名+密码-->
            <div class="deng_up">
                <img src="/Public/Images/common/24.png" style="height:auto;"/><br>

                <input type="text" name="username" placeholder="请输入用户名:由汉字数字下划线和字母组成" id="zhanghao"/>

                <br><br>

                <input type="password" name="password" placeholder="请输入密码" id="mima"/>

                <br><br>

                <input type="password" name="password2" placeholder="请输入确认密码" class="mima2" id="cmima"/>

                <br><br>

                <input type="text" name="email" placeholder="请输入邮箱地址" class="mima2" id="em"/>


            </div>


            <!--错误提示框-->
            <div  id="err"></div>


            <!--登陆-->
            <div class="deng_down">
                <img src="/Public/Images/common/25.png" class="tijiao" style="cursor: pointer"/>
            </div>
        </div>
    </div>

</div>


</body>
</html>

<div class="footer">
    <div>
        Copyright © 2016-2026 Onexplorer. All Rights Reserved
    </div>
    <div>Onexplorer版权所有</div>
</div>


</body>
</html>