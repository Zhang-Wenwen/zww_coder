<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html class="no-js">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>天外天Coder后台管理系统</title>

    <meta name="description" content="这是一�?index 页面">

    <meta name="keywords" content="index">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="renderer" content="webkit">

    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="/Public/amaze_assets/i/favicon.png">

    <link rel="apple-touch-icon-precomposed" href="/Public/amaze_assets/i/app-icon72x72@2x.png">

    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>

    <link rel="stylesheet" href="/Public/amaze_assets/css/amazeui.min.css"/>

    <link rel="stylesheet" href="/Public/amaze_assets/css/admin.css">
    <style>
            .error {
                font-size: 18px;
                font-weight: bold;
                color: red;
                margin:10px 0
            }
          
            
        </style>

</head>

<body>

<!--[if lte IE 9]>

<p class="browsehappy">你正在使�?strong>过时</strong>的浏览器，Amaze UI 暂不支持�?�?<a href="http://browsehappy.com/" target="_blank">升级浏览�?/a>

    以获得更好的体验�?/p>

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

        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">更新成员信息</strong></div>

    </div>


    <hr/>


    <div class="am-g">


        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">


        </div>


        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <form class="am-form am-form-horizontal"
                  action="http://coder.twtstudio.com/admin.php/Home/Team/saveinfo?teamer_id=126&grade=2015"
                  method="post" enctype="multipart/form-data" id="upload_form" >

                <div class="am-form-group">

                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 </label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_name" value="陈丁辰">


                    </div>

                </div>


                <div class="am-form-group">

                    <label class="am-u-sm-3 am-form-label">组别</label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_group" value="程序组">

                    </div>

                </div>


                <div class="am-form-group">

                    <label class="am-u-sm-3 am-form-label">学院</label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_school" value="教育学院">

                    </div>

                </div>
                
                 <div class="am-form-group">

                    <label class="am-u-sm-3 am-form-label">毕业去向</label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_go" value="">

                    </div>

                </div>

                <div class="am-form-group">

                    <label class="am-u-sm-3 am-form-label">个人主页</label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_mainpage_link" value="">

                    </div>

                </div>


                <div class="am-form-group">

                    <label class="am-u-sm-3 am-form-label">年级 </label>

                    <div class="am-u-sm-9">

                        <input type="text" name="teamer_grade" value="2015">


                    </div>

                </div>


                <div class="am-form-group">


                    <label class="am-u-sm-3 am-form-label">更改头像</label>

                    <div class="am-u-sm-9">

                    <input type="hidden" id="x1" name="x1"autocomplete="off" />
                    <input type="hidden" id="y1" name="y1" autocomplete="off"/>
                    <input type="hidden" id="x2" name="x2"autocomplete="off" />
                    <input type="hidden" id="y2" name="y2"autocomplete="off" />
                    
                    <input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" />

                    <div class="error">注意：上传前，先截图</div>
                    <div class="step2">
                        <img id="preview" />
                            <div class="info">
                            <ul>
                                <li><label>文件大小</label> <input type="text" id="filesize" name="filesize" class="input" autocomplete="off" /></li>
                                <input type="hidden" id="filetype" name="filetype" class="input"autocomplete="off"/>
                                 <input type="hidden" id="filedim" name="filedim" class="input"autocomplete="off"/>
                                <input type="hidden" id="w" name="w" class="input"autocomplete="off"/>
                                 <input type="hidden" id="h" name="h" class="input"autocomplete="off"/>
                            </ul>
                        </div>
                        
                    </div>
                  </div>


                    </div>


                


                <div class="am-form-group">

                    <div class="am-u-sm-9 am-u-sm-push-3">

                        <input type="submit" class="am-btn am-btn-primary" value="修改">

                    </div>

                </div>

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
<script type="text/javascript" src="http://www.sucaihuo.com/Public/js/other/jquery.js"></script> 
<script src="http://coder.twtstudio.com/Public/cut/js/jquery.Jcrop.min.js"></script>
<script src="http://coder.twtstudio.com/Public/cut/js/script.js"></script>

</body>

</html>