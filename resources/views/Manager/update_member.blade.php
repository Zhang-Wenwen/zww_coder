@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    member 修改
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{url('/manager/update/members')}}{{'/'.$member->id}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <h1> 基本信息</h1>
                                    <label class="control-label" for="inputSuccess">姓名</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="name" value="{{$member->name}}"required>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">学院专业</label>
                                        <input type="text" class="form-control" id="inputWarning" name="major" value="{{$member->major}}"required>
                                    </div>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="inputError">所属组别</label>
                                        <input type="text" class="form-control" id="inputError" name="group" value="{{$member->group}}"required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="control-label" for="inputSuccess">年级</label>
                                        <input type="text" class="form-control" id="inputSuccess" name="grade" value="{{$member->grade}}">
                                    </div>
                                    <label>选择照片（为了保持照片比列，请尽量上传1：1的照片哦）</label>
                                    <input type="file" name="file" value="{{$member->pic}}">
                                </div>
                                @if($errors->first('file') !=null)
                                <div class="alert alert-success">
                                    {{ $errors->first('file') }}
                                </div>
                              @endif
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