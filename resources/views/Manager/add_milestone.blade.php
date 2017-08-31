@extends('layouts.banner')
@section('content')
    <div class="col-lg-6">
        <h1>添加天外天大事记</h1>
        <form role="form">
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">添加时间</label>
                <input type="text" class="form-control" id="inputSuccess" name="year">
            </div>
            <div class="form-group has-warning">
                <label class="control-label" for="inputWarning">添加事件g</label>
                <input type="text" class="form-control" id="inputWarning"name="events">
            </div>
        </form>
    </div>
    @endsection