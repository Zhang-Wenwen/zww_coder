@extends('layouts.banner')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> 二维码查看及修改
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-16">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>链接名称</th>
                                <th>链接地址</th>
                                <th>链接描述</th>
                                <th>删除链接</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qrcodes as $key=>$value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->link}}</td>
                                    <td>{{$value->desc}}</td>
                                    <td><a href="{{url('manager/delete_Qrcode')}}{{'/'.$value->id}}"onclick= "javascript:return confirm('您确定要删除吗?')">删除</a>&nbsp;&nbsp;</td>
                                    @endforeach
                                        <div class="alert alert-info">
                                            <div style="text-align: center ;font-size: large"class="panel-heading">
                                            <a  href="{{url('manager/add_Qrcode')}}">添加链接</a>
                                        </div>
                                            </div>
                                </tr>
                            </tbody>
                        </table>
                        {{$qrcodes->links()}}
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