@extends('layouts.banner')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i>活动预告
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-16">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>活动名称</th>
                                <th>活动描述</th>
                                <th>活动地点</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advertise as $key=>$value)
                                <tr>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->desc}}</td>
                                    <td>{{$value->place}}</td>
                                    <td><a href="{{url('manager/delete_np/advertise')}}{{'/'.$value->id}}">点击删除</a></td>
                                    @endforeach
                                    <div class="alert alert-info">
                                        <div style="text-align: center ;font-size: large"class="panel-heading">
                                            <a  href="{{url('manager/add_advertise')}}">添加链接</a>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        {{$advertise->links()}}
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