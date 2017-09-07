<!DOCTYPE html>
<html lang="en">
{{--@extends('layouts.banner')--}}
{{--@section('content')--}}
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>产品管理</title>

    <!-- Bootstrap core CSS -->
    <link href="/projectspage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/projectspage/css/business-casual.css" rel="stylesheet">

</head>

<body>

<div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">产品展示</div>
<div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="/manager/home">主界面</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="/manager/home">主界面
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="/manager/member">我们的团队</a>
                </li>
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="/manager/projects">产品管理</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="/manager/milestones">天外天大事记</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    @foreach($projects as $key=>$value)
    <div class="bg-faded p-4 my-4">
        <div class="card card-inverse">
            <img class="card-img img-fluid w-100" style="height: 557px;width: 342px" src="{{$value->pic}}" alt="">
            <div class="card-img-overlay bg-overlay">
                <h2 class="card-title text-shadow text-white text-uppercase mb-0">{{$value->name}}</h2>
                <h4 class="text-shadow text-white">(0 为web， 1 为app ，3 为都是) <br>此产品为：{{$value->type}}</h4>
                <p class="lead card-text text-shadow text-white w-50 d-none d-lg-block">{{$value->desc}}</p>
                <a href="{{$value->link}}" class="btn btn-secondary">网站链接：{{$value->link}}</a>
                <br>
                <br>
                <a href="{{url('manager/update/projects')}}{{'/'.$value->id}}" class="btn btn-secondary" >修改内容</a>
                <a href="{{url('manager/delete/projects')}}{{'/'.$value->id}}" class="btn btn-secondary"onclick= "javascript:return confirm('您确定要删除吗?')">删除</a>&nbsp;&nbsp;
            </div>
        </div>
    </div>
    @endforeach
    <!-- Pagination -->
        <a href="{{url('manager/add/projects')}}" class="btn btn-secondary">添加新产品</a>
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item">
          {{$projects->links()}}
                </li>
            </ul>

</div>
<!-- /.container -->

<footer class="bg-faded text-center py-5">
    <div class="container">
        <p class="m-0">天外天 &copy; 天外天后台管理</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/projectspage/vendor/jquery/jquery.min.js"></script>
<script src="/projectspage/vendor/popper/popper.min.js"></script>
<script src="/projectspage/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>


{{--@endsection--}}