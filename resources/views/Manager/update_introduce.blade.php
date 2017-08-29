@extends('layouts.banner')
@section('content')
    <br>
    <br>
    <h3>
        {{$introduce->Model}}
        </h3>
    <link rel="stylesheet" href="/Trumbowyg/dist/ui/trumbowyg.min.css">
    <script src="/Trumbowyg/dist/trumbowyg.js"></script>
    <form role="form" action="{{url('manager/update/introduce')}}{{'/'.$introduce->id}}" method="POST" >
        {{csrf_field()}}
    模块名称：<br>
        <input id="model" name="model" type="text"  style="width:580px; height: 30px;" value="{{$introduce->Model}}">
    <hr>
    模块内容：<br>
        <textarea id="editor" name="editor" rows="20" cols="80">
            {{$introduce->content}}
        </textarea>
        <br>
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
        <script>
            $('#editor').trumbowyg({
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
                autogrow: true
            });
        </script>
    </form>
@stop