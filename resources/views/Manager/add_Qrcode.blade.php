@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    二维码 新增
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{url('/manager/add_Qrcode')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <h1> 添加二维码以及生成二维码</h1>
                                    <label class="control-label" for="inputSuccess">目标链接</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="link" value=""required>
                                    @if($errors->first('link')!=null)
                                    <div class="alert alert-success">
                                        {{ $errors->first('link') }}
                                    </div>
                                    @endif
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">目标名称</label>
                                        <input type="text" class="form-control" id="inputWarning" name="name" value=""required>
                                    </div>
                                    @if($errors->first('name')!=null)
                                        <div class="alert alert-success">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <div class="form-group has-error">
                                        <label class="control-label" for="inputError">目标简介</label>
                                        <input type="text" class="form-control" id="inputError" name="desc" value=""required>
                                    </div>

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