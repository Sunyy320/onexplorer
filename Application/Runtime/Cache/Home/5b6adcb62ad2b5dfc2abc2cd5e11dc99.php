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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Onexplorer探索者登陆</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/log.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.min.js"></script>

    <script type="text/javascript">
        $(function(){

            //提交实现
            $(".tijiao").click(function(){
                if(!$("#zhanghao").val()||!$("#mima").val()){
                    $("#err").show();
                    $("#err").html("用户名或密码不能为空");
                    return;
                }else{
                    $.ajax({
                        type:"POST",
                        url:"<?php echo U('login');?>",
                        dataType:"json",
                        //data:'{username:$("#zhanghao").val(),password:$("#mima").val()}',
                        data:"username="+$("#zhanghao").val()+"&password="+$("#mima").val(),
                        success:function(msg){
                            if(msg.info=="error"){
                                $("#err").show();
                                $("#err").html("用户名或者密码错误");
                                return;
                            }else{
                                window.location.href=msg.callback;
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
        <!--登录框-->
        <div id="denglukuang">

                <!--用户名+密码-->
            <div class="deng_up">
                <img src="/Public/Images/common/20.png" style="height:auto;"/><br>

                <input type="text" name="username" placeholder="请输入用户名" id="zhanghao"/>

                <br><br>

                <input type="password" name="password" placeholder="请输入密码" id="mima"/>

            </div>

            <!--注册+忘记密码-->
            <div class="deng_mid">

                <a href="reg.html" style="text-decoration:none;">
                    <img src="/Public/Images/common/23.png" />
                </a>

                &nbsp;

                <a href="#" style="text-decoration:none;">
                    <img src="/Public/Images/common/26.png" />
                </a>

                <br/>
            </div>

            <!--错误提示框-->
            <div  id="err"></div>



            <!--登陆-->
            <div class="deng_down">
                <img src="/Public/Images/common/22.png" class="tijiao" style="cursor: pointer"/>
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