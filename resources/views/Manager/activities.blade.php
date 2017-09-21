@extends('layouts.banner')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i>活动详情
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
                                <th>活动时间</th>
                                <th>简要概括</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activities as $key=>$value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->time}}</td>
                                    <td>{{$value->summary}}</td>
                                    <td><a href="{{url('manager/delete/activities')}}{{'/'.$value->id}}"onclick= "javascript:return confirm('您确定要删除吗?')">删除</a>
                                        /<a href="{{url('manager/update_activities')}}{{'/'.$value->id}}"onclick= "javascript:return confirm('您确定要修改吗?')">修改</a>
                                        &nbsp;&nbsp;
                                    @endforeach
                                </tr>
                                <div class="alert alert-info">
                                    <div style="text-align: center ;font-size: large"class="panel-heading">
                                        <a  href="{{url('manager/add_activities')}}">添加详情</a>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                        {{$activities->links()}}
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