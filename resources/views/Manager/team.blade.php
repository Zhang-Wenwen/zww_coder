<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
{{--@extends('layouts.banner')--}}
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Read About:Click the photo to update a new photo of this people</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrape_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/bootstrape_admin/css/round-about.css" rel="stylesheet">

</head>
<body>
{{--@section('content')--}}
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/manager/home">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manager/member">member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manager/team">team</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Contact</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Introduction Row -->
    <h1 class="my-4">About Us
        <small>It's Nice to Meet You!</small>
    </h1>
  <p>
      Delete,add or edit Team members as needed;
      </p>
    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="my-4">Our Team</h2>
        </div>
        @foreach($team as $key=>$value)
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            {{--<img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">--}}
            <a href="{{url('manager/update_team')}}{{'/'.$value->id}}">
            <img style="height:200px; width:200px; " class="rounded-circle img-fluid d-block mx-auto" src="/storage/app/public/{{$value->pic}}" alt="">
                </a>
            <h3>{{$value->name}}
                <small>{{$value->now}}</small>
            </h3>
{{--            <small>{{$value->text}}</small>--}}
            <p>{{$value->text}}</p>
            <a href="{{url('manager/delete/team')}}{{'/'.$value->id}}">删除</a>
        </div>
            @endforeach
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <a href="{{url('manager/add/team')}}">
            <img style="height:200px; width:200px; "  class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
                </a>
            <h3>Add more
                <small>Welcome</small>
            </h3>
            <p>who is the new member?</p>
        </div>
    </div>
</div>
{{$team->links()}}
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Welcome to Coder</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/bootstrape_admin/vendor/jquery/jquery.min.js"></script>
<script src="/bootstrape_admin/vendor/popper/popper.min.js"></script>
<script src="/bootstrape_admin/vendor/bootstrap/js/bootstrap.min.js"></script>
{{--@stop--}}
</body>

</html>
