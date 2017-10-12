@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                     新增
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{url('/manager/add/advertise')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <h1> 添加活动</h1>
                                    <label class="control-label" for="inputSuccess">活动名称</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="title" value=""required>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">活动描述</label>
                                        <input type="text" class="form-control" id="inputWarning" name="desc" value=""required>
                                    </div>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="inputError">活动地点</label>
                                        <input type="text" class="form-control" id="inputError" name="place" value=""required>
                                    </div>
                                    <label>请选择图片</label>
                                    <input type="file" name="file" value="" required >
                                </div>
                                <button type="submit" class="btn btn-default">提交</button>
                                <button type="reset" class="btn btn-default"value="Reset">重置</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop