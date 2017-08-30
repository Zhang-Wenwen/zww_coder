@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  天外天大事记
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        @foreach($milestones as $key=>$value)
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                   <a data-toggle="collapse" data-parent="#accordion" >{{$value->time}}</a>
                                </h4>
                            </div>
                            <a data-toggle="collapse" data-parent="#accordion" href="{{url('manager/add/introduce')}}{{'/'.$value->id}}">添加时间</a>
                            <div id="collapseOne" class="panel-collapse collapse in" >
                                @foreach($value->events as $key=>$value)
                              <div class="panel-body">
                                  {{$value->events}}
                                    <br>
                                  <a class="panel-body" href="{{url('manager/add/events')}}{{'/'.$value->id}}">添加事件</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    {{$milestones->links()}}
    @endsection