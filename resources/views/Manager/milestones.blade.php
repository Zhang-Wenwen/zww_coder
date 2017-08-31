@extends('layouts.banner')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> 天外天大事记
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-16">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Event</th>
                                <th>Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($milestones as $key=>$value)
                            <tr>
                                <td>{{$value->year}}</td>
                                <td>{{$value->events}}</td>
                                <td>  <a href="{{url('manager/update/milestones')}}{{'/'.$value->id}}">update event</a></td>
                                @endforeach
                                <div style="text-align: center ;font-size: large"class="panel-heading">
                                    <a  href="{{url('manager/add/events')}}">添加时间和事件</a>
                                </div>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.col-lg-4 (nested) -->
                <!-- /.col-lg-8 (nested) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.panel-body -->
    </div>

    @endsection