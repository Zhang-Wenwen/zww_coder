@extends('layouts.banner')
@section('content')
    <div class="col-lg-20">
        @foreach($introduce as $key=>$value)
        <div class="jumbotron">
            <h1>{{$value->Model}}</h1>
            <p>{{$value->content}}</p>
            <p><a class="btn btn-primary btn-lg" role="button" href="{{url('/manager/update/introduce')}}{{'/'.$value->id}}">修改</a>
            </p>
        </div>
            <hr>
            <hr>
            @endforeach
    </div>
    {{$introduce->links()}}
    @stop