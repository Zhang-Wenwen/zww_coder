@extends('layouts.banner')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/Trumbowyg/dist/ui/trumbowyg.min.css">
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/Trumbowyg/dist/trumbowyg.js"></script>
<script type="text/javascript">
    window.jQuery || document.write("<script src='../js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{url('/manager/add/activities')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    @if($errors->first('file')!=null)
                                        <div class="alert alert-success">
                                            {{ $errors->first('file') }}
                                        </div>
                                    @endif
                                    <h1> 添加活动详情</h1>
                                    <label class="control-label" for="inputSuccess">活动名称</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="name" value=" "required>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="inputError">活动时间</label>
                                        <input type="text" class="form-control" id="inputError" name="time" value=" "required>
                                    </div>
                                        <div class="form-group">
                                            <label>详情概要</label>
                                            <textarea class="form-control" name="summary" rows="3" required></textarea>
                                        </div>
                                    <div class="form-group has-warning">
                                        <label class="control-label" for="inputWarning">活动内容</label>
                                        <br>
                                        <textarea id="editor" name="editor" rows="20" cols="80">

                                        </textarea>
                                        <br>
                                    </div>
                                    <label>选择照片（请上传557*342大小的图片）</label>
                                    <input type="file" name="file" value="" required >
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button>
                                <button type="reset" class="btn btn-primary"value="Reset">重置</button>
                                <script src="/Trumbowyg/dist/trumbowyg.js"></script>
                                <script src="/Trumbowyg/dist/plugins/upload/trumbowyg.upload.js"></script>
                                <script src="/Trumbowyg/dist/plugins/upload/trumbowyg.upload.js"></script>
                                <script>
                                    $('#editor').trumbowyg({
                                        btnsDef: {
                                            // 设置上传的3种方法，远程上传，本地上传，图片64位加密
                                            image: {
                                                dropdown: [ 'upload'],
                                                ico: 'insertImage'
                                            }
                                        },
                                        btns: [
                                            ['viewHTML'],
                                            ['formatting'],
                                            'btnGrp-design',
                                            ['superscript', 'subscript'],
                                            'image',
                                            'btnGrp-justify',
                                            'btnGrp-lists',
                                            ['horizontalRule'],
                                            ['table'],
                                            ['foreColor', 'backColor'],
                                            ['removeformat'],
                                            ['fullscreen']
                                        ],
                                        plugins: {
                                            upload: {
                                                serverPath: '/manager/file',
                                                fileFieldName: 'upload'
                                            }
                                        },
                                        autogrow: true
                                    });
                                </script>
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