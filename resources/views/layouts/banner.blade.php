
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coder 管理后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/sb-admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/sb-admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Coder 管理后台</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }} <i class="fa fa-caret-down"> </i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="http://127.0.0.1:1024/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fa-fw"></i>   Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-header -->

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('/manager')}}"><i class="fa fa-table fa-fw"></i>主页面</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 管理成员<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/manager/team"><i class="fa fa-dashboard fa-fw"></i> 我们的团队</a>
                            </li>
                            <li>
                                <a href="/manager/member"><i class="fa fa-dashboard fa-fw"></i>我们的成员</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 留言板<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/manager/message_board/1')}}"><i class="fa fa-edit fa-fw"></i>已通过留言</a>
                            </li>
                            <li>
                                <a href="{{url('/manager/message_board/-1')}}"><i class="fa fa-edit fa-fw"></i>未通过留言</a>
                            </li>
                            <li>
                                <a href="{{url('/manager/message_board/0')}}"><i class="fa fa-edit fa-fw"></i>未审核留言</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="{{url('/manager/milestones')}}"><i class="fa fa-wrench fa-fw"></i>天外天大事记<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{url('/manager/projects')}}"><i class="fa fa-sitemap fa-fw"></i>产品管理<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{url('/manager/Qrcode')}}"><i class="fa fa-files-o fa-fw"></i> 二维码<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{url('/manager/Aregister')}}"><i class="fa fa-files-o fa-fw"></i> 注册新管理员<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{url('/manager/advertise')}}"><i class="fa fa-files-o fa-fw"></i> 活动预告<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{url('/manager/activities')}}"><i class="fa fa-files-o fa-fw"></i>活动详情<span class="fa arrow"></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">

        @section('content')

            @show
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/sb-admin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/sb-admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/sb-admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/sb-admin/vendor/raphael/raphael.min.js"></script>
<script src="/sb-admin/vendor/morrisjs/morris.min.js"></script>
<script src="/sb-admin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/sb-admin/dist/js/sb-admin-2.js"></script>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@section('func')

@show


</body>

</html>
