<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=yes">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <link rel="stylesheet" href="/Public/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="/Public/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Css/home.css">
    <title>天外天工作室-首页</title>
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

<div class="header">
    <!--滚动插件开始-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pic_showid"] == 0 ): ?><li class="active" data-target="#carousel-example-generic" data-slide-to="<?php echo ($vo["pic_showid"]); ?>"></li>
                    <?php else: ?>
                    <li  data-target="#carousel-example-generic" data-slide-to="<?php echo ($vo["pic_showid"]); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pic_showid"] == 0 ): ?><div class="item active " align="center" >
                        <a href="<?php echo ($vo["pic_link"]); ?>"><img src="/Public<?php echo ($vo["pic_loc"]); ?>"></a>
                    </div>
                    <?php else: ?>
                    <div class="item " align="center" >
                            <a href="<?php echo ($vo["pic_link"]); ?>"><img src="/Public<?php echo ($vo["pic_loc"]); ?>"></a>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>
    <!--滚动插件结束-->
</div>



<div class="card">
    <a href="/index.php/home/about/index">
    <div class="card1">
        <img src="/Public/Images/Frontend/puke1.png" class="puke">
        <img src="/Public/Images/Frontend/puke1-text.png" class="puke1-text">
    </div>
    </a>
    <a href="/index.php/home/project/index">
    <div class="card2">
        <img src="/Public/Images/Frontend/puke2.png" class="puke">
        <img src="/Public/Images/Frontend/puke2-content.png" class="puke2-content">
    </div>
    </a>
    <a href="/index.php/home/member/index">
    <div class="card3">
        <img src="/Public/Images/Frontend/puke3.png" class="puke">
        <img src="/Public/Images/Frontend/puke3-content.png" class="puke3-content">
        <img src="/Public/Images/Frontend/puke3-dong.png" class="puke3-dong">
    </div>
    </a>
    <a href="http://coder.twtstudio.com/hr/">
    <div class="card4">
        <img src="/Public/Images/Frontend/puke4.png" class="puke">
        <img src="/Public/Images/Frontend/star1.png" class="star1">
        <img src="/Public/Images/Frontend/star2.png" class="star2">
        <img src="/Public/Images/Frontend/star3.png" class="star3">
    </div>
    </a>
</div>

<div class="info">
    <img src="/Public/Images/Frontend/tie.png" class="tie">
    <div class="gra-text1" id="text1">
        <div class="text1">
        <p><?php echo ($text1["word"]); ?></p>
        </div>
    </div>
    <img src="/Public/Images/Frontend/shaizi.png" class="shaizi">
    <div class="gra-text2" id="text2">
        <div class="text2">
        <p>
            <?php echo ($text2["word"]); ?>
        </p>
        </div>
    </div>
    <!-- <img src="/Public/Images/Frontend/map.png" class="map">  -->

    <!--百度地图容器-->
    <div style="margin:1px auto;
width:510px;
height:510px;
border-radius:510px;
border:2px solid #fff;
overflow:hidden;
-webkit-box-shadow:0 0 3px #ccc;
box-shadow:0 0 3px #ccc;left:450px;top:5px;" id="dituContent"></div>

    <div class="hand">
        <img src="/Public/Images/Frontend/hand.png">
    </div>

</div>

<div class="footer">
    <p><a href="http://www.twt.edu.cn/" class="http">http://www.twt.edu.cn/ 天外天首页</a></p>
    <p>天外天工作室©2000-2015 津 ICP 备000017号</p>
</div>

</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap() {
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addPolyline();//向地图中添加线
    }

    //创建地图函数：
    function createMap() {
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(117.318359, 38.998426);//定义一个中心点坐标
        map.centerAndZoom(point, 16);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent() {
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl() {
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }

    //标注线数组
    var plPoints = [{
        style: "solid",
        weight: 4,
        color: "#f00",
        opacity: 0.6,
        points: ["117.318431|38.999407", "117.318485|39.00287", "117.318449|38.999365", "117.318449|38.999421"]
    }
        , {
            style: "solid",
            weight: 4,
            color: "#f00",
            opacity: 0.6,
            points: ["117.318485|38.999435", "117.323749|38.999505", "117.323767|38.999519", "117.323785|38.999519"]
        }
        , {
            style: "solid",
            weight: 4,
            color: "#f00",
            opacity: 0.6,
            points: ["117.323749|38.999491", "117.323749|38.996841"]
        }
        , {
            style: "solid",
            weight: 4,
            color: "#f00",
            opacity: 0.6,
            points: ["117.318467|39.002828", "117.317515|39.002828"]
        }
    ];
    //向地图中添加线函数
    function addPolyline() {
        for (var i = 0; i < plPoints.length; i++) {
            var json = plPoints[i];
            var points = [];
            for (var j = 0; j < json.points.length; j++) {
                var p1 = json.points[j].split("|")[0];
                var p2 = json.points[j].split("|")[1];
                points.push(new BMap.Point(p1, p2));
            }
            var line = new BMap.Polyline(points, {
                strokeStyle: json.style,
                strokeWeight: json.weight,
                strokeColor: json.color,
                strokeOpacity: json.opacity
            });
            map.addOverlay(line);
        }
    }

    initMap();//创建和初始化地图
</script>

</html>