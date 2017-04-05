<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=yes">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/about.css">
    <title>天外天工作室-关于我们</title>
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
    <img src="/Public/Images/Frontend/about.png" class="about">
    <img src="/Public/Images/Frontend/about1.png" class="about1">
    <img src="/Public/Images/Frontend/about2.png" class="about2">
    <img src="/Public/Images/Frontend/about3.png" class="about3">

    <div class="text1">
        <p> <?php echo ($first_col); ?>

</p>
    </div>
    <div class="text2">
        <p><?php echo ($sec_col); ?>
        </p>
    </div>
    <div class="text3">
        <p>
           <?php echo ($third_col); ?>
        </p>
    </div>
</div>

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