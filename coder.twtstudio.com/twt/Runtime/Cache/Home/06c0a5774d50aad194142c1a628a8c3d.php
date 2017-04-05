<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="/Public/Css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/team.css">

    <title>天外天工作室-团队分工</title>


    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            //每10毫秒检查一下是否需要换字
            setTimeout("change_text()", 10);

            $(".point").mouseover(function () {
                $('.zhuan').addClass('paused');
                $('.monitor').addClass('paused');
                var font = parseFloat($('.monitor').css('font-size'));
                font = font.toFixed(1);
                if (font > 20.4 && font < 23.4) {
                    $(".change").html($("#part1").html());
                }
                else if (font >= 23.4 && font <= 26.4) {
                    $(".change").html($("#part2").html());
                }
                else {
                    $(".change").html($("#part3").html());
                }
            });

            $(".point").mouseout(function () {
                $('.zhuan').removeClass('paused');
                $('.monitor').removeClass('paused');
            });

        });
        //根据转盘位置，切换右边的字
        function change_text() {
            var font = parseFloat($('.monitor').css('font-size'));
            font = font.toFixed(1);
            if (font > 20.4 && font < 23.4) {
                $(".change").html($("#part1").html());
            }
            else if (font >= 23.4 && font <= 26.4) {
                $(".change").html($("#part2").html());
            }
            else {
                $(".change").html($("#part3").html());
            }
            setTimeout("change_text()", 10);
        }

    </script>


</head>
<body>
<div class="nav">
    <!-- top start -->
    <header class="am-topbar admin-header">
        <a href="/index.php/home/index/index"><img src="/Public/Images/Frontend/logo.png"></a>
<div class="navlist">
    <ul>
        <li><a class="nav_index"href="/index.php/home/index/index">首页</a></li>
        <li><a class="nav_about"href="/index.php/home/about/index">关于我们</a></li>
        <li><a class="nav_project"href="/index.php/home/project/index">项目成果</a></li>
        <li><a class="nav_TeamIndex"href="/index.php/Home/TeamIndex/showinfo1">成员介绍</a></li>
        <li><a class="nav_member"href="/index.php/home/member/index">团队分工</a></li>
        <li><a href="http://coder.twtstudio.com/hr" target="_blank">加入我们</a></li>
    </ul>
</div>

<script src="/Public/highlight_click.js"></script>
    </header>
    <!-- top end -->
</div>


<div class="content">
    <div id="zhuan">
        <img src="/Public/Images/Frontend/zhuan.png" class="zhuan">
    </div>
    <img src="/Public/Images/Frontend/point.png" class="point">

    <div class="change">
        <p id='content'><span style="font-size:15px;color:#FF6347;">面子的担当</span><br>
            负责网站的设觉设计，将网站和APP的需求转化成图形界面，需要设计者运用创意和逻辑将网站的功能、美观度、用户的需求体验做一个很好的结合</p>
    </div>
</div>

<!-- 下面的p元素用于判断动画进度，不用管 -->
<p class="monitor" style=""></p>
<!--下面的div里写对应的html -->
<div id="part1" style="display:none;"><p><span style="font-size:15px;color:#FF6347;">程序猿</span><br>
    程序组分为前端组、程序组和移动组。前端组负责产品界面的构建、程序组承担后台逻辑和<br>业务，移动组负责iOS&Android等移动平台的开发</p></div>
<div id="part2" style="display:none;"><p><span style="font-size:15px;color:#FF6347;">设计狮</span><br>
    我们是高冷的设计师，负Web端及移动端APP的视觉、交互设计。</p></div>
<div id="part3" style="display:none;"><p><span style="font-size:15px;color:#FF6347;">产品汪</span><br>
    俗称产品经理，DM，负责产品设计，项目管理，运营推广</p></div>


<!-- footer start -->
<div class="pub_footer">
    <a href="http://www.twt.edu.cn/" class="http">http://www.twt.edu.cn/天外天首页</a>
    <a href="http://coder.twtstudio.com/hr" class="img"><img src="/Public/Images/Frontend/footer.png"></a>
    <p>天外天工作室©2000-2015 津 ICP 备000017号</p>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var pages = window.location.href.split("/");
		console.log(pages);		
	});
</script>
<!-- footer end -->

</body>
</html>