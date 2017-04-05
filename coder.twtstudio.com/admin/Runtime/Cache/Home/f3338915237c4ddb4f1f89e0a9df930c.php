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


<!-- content start -->
<div class="admin-content">
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">成员列表</strong></div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-default"><a
                                href="http://coder.twtstudio.com/admin.php/Home/Team/member_table?grade=2012">
                            2012</a></button><button type="button" class="am-btn am-btn-default"><a
                                href="http://coder.twtstudio.com/admin.php/Home/Team/member_table?grade=2013">
                            2013</a></button><button type="button" class="am-btn am-btn-default"><a
                                href="http://coder.twtstudio.com/admin.php/Home/Team/member_table?grade=2014">
                            2014</a></button><button type="button" class="am-btn am-btn-default"><a
                                href="http://coder.twtstudio.com/admin.php/Home/Team/member_table?grade=2015">
                            2015</a></button>                </div>
            </div>
        </div>

    </div>


    <div class="am-g">
        <div class="am-u-sm-12">
            <form class="am-form">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-id">姓名</th>
                        <th class="table-title">学院</th>
                        <th class="table-type">年级</th>
                        <th class="table-type">毕业去向</th>
                        <th class="table-author am-hide-sm-only">组别</th>
                        <th class="table-date am-hide-sm-only">照片</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>


                            <td>杨兴锋</td>
                            <td>软件学院</a></td>
                            <td>2015</td>
                             <td></td>
                            <td class="am-hide-sm-only">程序组</td>
                            <td class="am-hide-sm-only"><a
                                    href="http://coder.twtstudio.com/admin.php/Home/Team/see_photo?photo_loc=14583773750391.jpg.'b'">查看
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> <a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/updateinfo?teamer_id=108&grade=2015">编辑</a>
                                        </button>

                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span><a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/dinfo?teamer_id=108&grade=2015">
                                            删除</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr><tr>


                            <td>陈丁辰</td>
                            <td>教育学院</a></td>
                            <td>2015</td>
                             <td></td>
                            <td class="am-hide-sm-only">程序组</td>
                            <td class="am-hide-sm-only"><a
                                    href="http://coder.twtstudio.com/admin.php/Home/Team/see_photo?photo_loc=14618529230034.jpg.'b'">查看
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> <a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/updateinfo?teamer_id=132&grade=2015">编辑</a>
                                        </button>

                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span><a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/dinfo?teamer_id=132&grade=2015">
                                            删除</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr><tr>


                            <td>边臣雅</td>
                            <td>机械学院</a></td>
                            <td>2015</td>
                             <td></td>
                            <td class="am-hide-sm-only">产品组</td>
                            <td class="am-hide-sm-only"><a
                                    href="http://coder.twtstudio.com/admin.php/Home/Team/see_photo?photo_loc=14643494100661.jpg.'b'">查看
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> <a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/updateinfo?teamer_id=146&grade=2015">编辑</a>
                                        </button>

                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span><a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/dinfo?teamer_id=146&grade=2015">
                                            删除</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr><tr>


                            <td>余海波</td>
                            <td>教育学院</a></td>
                            <td>2015</td>
                             <td></td>
                            <td class="am-hide-sm-only">设计组</td>
                            <td class="am-hide-sm-only"><a
                                    href="http://coder.twtstudio.com/admin.php/Home/Team/see_photo?photo_loc=14644330700330.jpg.'b'">查看
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> <a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/updateinfo?teamer_id=150&grade=2015">编辑</a>
                                        </button>

                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span><a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/dinfo?teamer_id=150&grade=2015">
                                            删除</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr><tr>


                            <td>李洋</td>
                            <td>电信学院</a></td>
                            <td>2015</td>
                             <td></td>
                            <td class="am-hide-sm-only">程序组</td>
                            <td class="am-hide-sm-only"><a
                                    href="http://coder.twtstudio.com/admin.php/Home/Team/see_photo?photo_loc=14644408620241.png.'b'">查看
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> <a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/updateinfo?teamer_id=153&grade=2015">编辑</a>
                                        </button>

                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span><a
                                                href="http://coder.twtstudio.com/admin.php/Home/Team/dinfo?teamer_id=153&grade=2015">
                                            删除</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr>                    </tbody>
                </table>
                <div class="am-cf">
                    共 5 条记录

                    <div class="am-fr">
                        <ul class="am-pagination">


                            <li><div> <<  >> </div></li>
                        </ul>
                    </div>
                </div>
                <hr/>
                <p>注：.....</p>
            </form>
        </div>

    </div>
</div>
</div>
<!-- content end -->


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/amaze_assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/amaze_assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/amaze_assets/js/amazeui.min.js"></script>
<script src="/Public/amaze_assets/js/app.js"></script>
</body>
</html>