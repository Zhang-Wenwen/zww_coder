@extends('layouts.banner')
@section('content')
        <br>
        <br>
        @foreach($introduce as $key=>$value)
            <div class="panel-body">
            <h1>{!! htmlspecialchars_decode($value->Model) !!}</h1>
            <p>{!! htmlspecialchars_decode($value->content) !!}</p>
            <p><a class="btn btn-primary btn-lg" role="button" href="{{url('/manager/update/introduce')}}{{'/'.$value->id}}">修改</a>
            </p>
        </div>
            <hr>
            <hr>
            @endforeach
    {{$introduce->links()}}
    @stop