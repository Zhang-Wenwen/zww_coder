@extends('layouts.banner')
@section('content')
    <div class="col-lg-6">
        <h1>添加天外天大事记</h1>
        <form role="form" action="{{url('/manager/update/milestones')}}{{'/'.$milestones->id}}" method="POST" >
            {{csrf_field()}}
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">添加时间</label>
                <input type="text" class="form-control" id="inputSuccess" name="year" value="{{$milestones->year}}" required>
            </div>
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">添加事件</label>
                <input type="text" class="form-control" id="inputSuccess" name="events" value="{{$milestones->events}}"  required>
            </div>
            <button type="submit" class="btn btn-default">确认修改</button>
        </form>
    </div>
@endsection