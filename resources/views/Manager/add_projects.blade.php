@extends('layouts.banner')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">产品管理</h1>
        </div>
        <!-- /.col-lg-12 --><div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        产品信息管理
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form"action="{{url('/manager/add/projects')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>产品名字</label>
                                        <input class="form-control" type="text" name="name" value="" required>
                                        <p class="help-block">请填写需要的产品名字</p>
                                    </div>
                                    <div class="form-group">
                                        <label>产品链接</label>
                                        <input class="form-control" placeholder="Enter text" type="text" name="link" required>
                                    </div>
                                    <div class="form-group">
                                        <label>选择照片（请上传557*234大小的图片哦）</label>
                                        <input type="file" type="text" name="file"required>
                                    </div>
                                    <div class="form-group">
                                        <label>选择类型（1 为web，0 为app  默认为1哦）</label>
                                        <select class="form-control" name="type" required>
                                            <option>1</option>
                                            <option>0</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            产品描述
                                        </label>
                                        <textarea class="form-control" rows="3" type="text" name="desc" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
@endsection