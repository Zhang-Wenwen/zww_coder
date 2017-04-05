<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>天外天工作室-团队分工</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/Public/mobile/public.css">

	<script type="text/javascript" src="/Public/mobile/jquery.min.js"></script>
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
<body style="min-height:600px;">
	<header>
		<img src="/Public/mobile/images/logo.png">
	</header>


<div class="content">
    <img src="/Public/mobile/images/section.png" class="section">
    <div id="zhuan">
        <img src="/Public/mobile/images/zhuan.png" class="zhuan">
    </div>
    <img src="/Public/mobile/images/point.png" class="point">

<div class="change-wrapper">
    <div class="change">        
        <p id='content'><span style="color:#f7a257;font-size:16px;">面子的担当</span><br>
            负责网站的设觉设计，将网站和APP的需求转化成图形界面，需要设计者运用创意和逻辑将网站的功能、美观度、用户的需求体验做一个很好的结合</p>
    </div>
</div>
</div>

<!-- 下面的p元素用于判断动画进度，不用管 -->
<p class="monitor" style=""></p>
<!--下面的div里写对应的html -->
<div id="part1" style="display:none;"><p><span style="color:#f7a257;font-size:16px;">程序猿</span><br>
    程序组分为前端组、程序组和移动组。前端组负责产品界面的构建、程序组承担后台逻辑和业务，移动组负责iOS和Android等移动平台的开发。</p></div>
<div id="part2" style="display:none;"><p><span style="color:#f7a257;font-size:16px;">设计狮</span><br> 
    我们是高冷的设计师，负Web端及移动端APP的视觉、交互设计。</p></div>
<div id="part3" style="display:none;"><p><span style="color:#f7a257;font-size:16px;">产品汪</span><br> 
    俗称产品经理，DM，负责产品设计，项目管理，运营推广</p></div>


	<footer>
		<ul>
			<li>
				<a class="nav_member" href="/index.php/home/member/index">团队分工</a>
			</li>
			<li>
				<a class="nav_project" href="/index.php/home/project/index">项目成果</a>
			</li>
			<li >
            <a class="nav_Index" href="/index.php/home/Index/index"><img src="/Public/mobile/images2/home-icon.png" class="home-icon"></a>
           </li>
			<li>
				<a class="nav_TeamIndex" href="/index.php/Home/TeamIndex/showinfo1">成员介绍</a>
			</li>
			<li>
				<a class="nav_about" href="/index.php/home/about/index">关于我们</a>
			</li>
		</ul>
	</footer>

<script src="/Public/mobile/highlight_click.js"></script>
</body>
</html>