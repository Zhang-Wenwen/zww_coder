<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>天外天Coder后台管理系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/Public/amaze_assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/amaze_assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/Public/amaze_assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/amaze_assets/css/admin.css">
    <script type="text/javascript" src="/Public/Js/my.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery-ui.min.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<!-- top start -->
<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
    <a href="/admin.php/Home/Index/home"><span class="am-icon-home"> <strong>天外天Coder</strong> <small>后台管理系统 &nbsp
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    </small></a>
    <small><span>前台页面：</span></small>
    <small><a href="/index.php/Home/Index/index" target="_blank"><span class="am-icon-home"></span> 首页</a></small>
    <small><a href="/index.php/Home/Project/index" target="_blank"><span class="am-icon-file"></span> 项目成果</a>
    </small>
    <small><a href="/index.php/Home/TeamIndex/showinfo1" target="_blank"><span class="am-icon-file"></span>
        团队分工</a></small>
</div>

<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
        data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
        class="am-icon-bars"></span></button>

<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
        <li class="am-dropdown" data-am-dropdown>
            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
            </a>
            <ul class="am-dropdown-content">
                <li><a href="/admin.php/Home/change/change"><span class="am-icon-cog"></span> 修改密码</a></li>
                <li><a href="/admin.php/Home/logout/index"><span class="am-icon-power-off"></span> 退出</a></li>
            </ul>
        </li>
        <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span
                class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
</div>
</header>
<!-- top end -->

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li><a href="/admin.php/Home/Index/home"><span class="am-icon-home"></span> 后台首页</a></li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span>
                    编辑首页</a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                    <li><a href="/admin.php/Home/Index/add" class="am-cf"><span class="am-icon-check"></span> 添加轮播</a>
                    </li>
                    <li><a href="/admin.php/Home/Index/index"><span class="am-icon-puzzle-piece"></span> 编辑轮播</a>
                    </li>
                    <li><a href="/admin.php/Home/Index/sort"><span class="am-icon-puzzle-piece"></span> 轮播排序</a>
                    </li>
                    <li><a href="/admin.php/Home/Index/modifyword"><span class="am-icon-th"></span> 编辑文字</a></li>
                </ul>
            </li>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-file"></span>
                    编辑项目成果页</a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav1">
                    <li><a href="/admin.php/Home/Project/add" class="am-cf"><span class="am-icon-check"></span>
                        添加成果</a></li>
                    <li><a href="/admin.php/Home/Project/index"><span class="am-icon-puzzle-piece"></span>
                        编辑成果</a></li>
                    <li><a href="/admin.php/Home/Project/sort"><span class="am-icon-th"></span> 成果排序</a></li>
                </ul>
            </li>


            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-file"></span>
                    编辑团队分工页</a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav2">
                    <li><a href="http://coder.twtstudio.com/admin.php/Home/Team/index" class="am-cf"><span
                            class="am-icon-check"></span> 添加成员</a></li>
                    <li><a href="http://coder.twtstudio.com/admin.php/Home/Team/member_table"><span
                            class="am-icon-puzzle-piece"></span> 编辑成员</a></li>
                    <li><a href="http://coder.twtstudio.com/admin.php/Home/Team/show_update"><span
                            class="am-icon-puzzle-piece"></span> 页面设置</a></li>
                </ul>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav3'}"><span class="am-icon-file"></span>
                    编辑关于我们页</a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav3">
                    <li><a href="http://coder.twtstudio.com/admin.php/Home/About/index" class="am-cf"><span
                            class="am-icon-check"></span>编辑</a></li>
                  
                </ul>
            </li>
            <li><a href="/admin.php/Home/Change/change"><span class="am-icon-sign-out"></span> 修改密码</a></li>
            <li><a href="/admin.php/Home/logout/index"><span class="am-icon-sign-out"></span> 注销</a></li>
        </ul>


        <div class="am-panel am-panel-default admin-sidebar-panel">

        </div>
    </div>
</div>
<!-- sidebar end -->
<link rel="stylesheet" type="text/css" href="/Public/Css/main.css">
<style type="text/css">
    #module_list {
        margin-left: 4px

    }

    .modules {
        float: left;
        width: 50%;
        height: 24px;
        margin: 10px;
        overflow: hidden;
        border: 1px solid #acc6e9;
        background: #e8f5fe
    }

    .m_title {
        height: 24px;
        line-height: 24px;
        background: #afc6e9
    }

    #loader {
        height: 40px;
        text-align: left font-size : 40 px;

    }

    .clear {
        clear: both
    }
</style>
<script type="text/javascript">// JavaScript Document
$(function () {
    var $show = $("#loader");
    var $list = $("#module_list");

    $list.sortable({
        opacity: 0.6,//拖动透明
        revert: true,//缓冲效果
        cursor: 'move',//拖动时鼠标的样式
        update: function () {
            var new_order = [];
            $list.children(".modules").each(function () {
                new_order.push(this.title);
            });
            var newid = new_order.join(',');
            $.ajax(
                    {
                        type: "post",
                        url: "<?php echo U('Project/sort');?>",//服务器端处理程序
                        data: {order: newid},   //id:新的排列对应的ID,order：原排列顺序
                        beforeSend: function () {
                            $show.html("正在更新");
                        },
                        success: function (msg) {
                            $show.html("更新成功");
                        }
                    });
        }
    });
});
</script>
</head>
<style type="text/css" id="__theworld_success_css"></style>

<body>
<div id="admin-content">
    <h2 class="top_title">上下拖动即可调整顺序</h2>

    <div id="loader"></div>
    <form action="<?php echo U('Project/sort');?>" method='post' enctype="multipart/form-data">
        <input type="hidden" id="orderlist" value="" style="">

        <div id="module_list">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="modules" title="<?php echo ($data["id"]); ?>">
                    <h3 class="m_title" style="cursor: move;"><?php echo ($data["project_title"]); ?></h3>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

    </form>
</div>
</body>
</html>