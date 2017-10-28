@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    team 修改
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{url('/manager/add/team')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <h1> 基本信息</h1>
                                    <label class="control-label" for="inputSuccess">输入姓名</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="name" value=""required>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">当下工作</label>
                                        <input type="text" class="form-control" id="inputWarning" name="now" value=""required>
                                    </div>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="inputError">所属组别</label>
                                        <input type="text" class="form-control" id="inputError" name="group" value=""required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="control-label" for="inputSuccess">标签</label>
                                        <input type="text" class="form-control" id="inputSuccess" name="tag" value=""required>
                                    </div>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">工作室职务（没有则不填）</label>
                                        <input type="text" class="form-control" id="inputWarning" name="duty" value="">
                                    </div>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">年级</label>
                                        <input type="text" class="form-control" id="inputWarning" name="grade" value="">
                                    </div>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">学院</label>
                                        <input type="text" class="form-control" id="inputWarning" name="school" value="">
                                    </div>
                                    <label>选择照片（请上传668*565的照片哦）</label>
                                    <input type="file" name="file" value="" required>
                                </div>
                                @if($errors->first('file') !=null)
                                    <div class="alert alert-success">
                                        {{ $errors->first('file') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>学长寄语</label>
                                    <textarea class="form-control" name="text" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>选择类型</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked="">type 1   （现任）
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">type 0    （无职务）
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="3">type -1   （原职务）
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-default">提交</button>
                                    <button type="reset" class="btn btn-default"value="Reset">重置</button>
                                </div>

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