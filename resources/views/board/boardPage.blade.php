@extends('layouts.layout')
@section('title')
    MessageBox
@endsection
@section('js-css')
    <link href="{{asset('/css/article.css')}}" rel="stylesheet">
    <link href="{{asset('css/box.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('active3')
    active
@endsection
@section('contains')
    <div class="artMake-login-box">
        <form method="post" id="artMakePost" enctype="multipart/form-data">
            <p>Message For Me</p>
            @csrf
            <div class="artMake-user-box">
                <script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/ueditor.config.js')}}"></script>
                <script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/ueditor.all.min.js')}}"> </script>
                <script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/lang/zh-cn/zh-cn.js')}}"></script>
                <script type="text/javascript">
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');
                </script>
                <script id="editor" type="text/plain" style="width:100%;height:300px;" name="message"></script>
            </div>
            <input type="hidden" name="cons" id="cons" value="">
            <div class="board-box">
                <input type="button" id="" name="" onclick="putMessage()" value="提交" class="boardBtn">
                <input type="button" id="" name="" onclick="flush()" value="刷新" class="boardBtn">
                <div class="board-box">
                    <label for="check">隐藏</label>
                    <input type="checkbox" id="check" name="check" value="隐藏">
                </div>
            </div>

        </form>
        <div class="box-container">
            <div class="holder">
                <p id="start">:</p>
                @foreach($loading as $a)
                    <div>
                        <p>{{$a->id}}/{{$a->user}}/{{$a->updateDate}}:</p>
                        {{$a->message}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    function putMessage() {
        document.getElementById('cons').value = UE.getEditor('editor').getContentTxt();
        var message =  document.getElementById('cons').value;
        //var message = $('#message').val();
        var check = $('#check').val();
    $.ajax({
        type: "POST",
        url: "{{ url('/board/message') }}",
        dataType: 'json',
        data: {
            "message":message,
            "check":check,
        },
        success: function (data) {
        if(data.code == 'success'){
            $('#start').after(context(message));
            console('succss');
        }else{
             alert('register fail');
         }
        },
        error: function(request, status, error){
            alert(error);
         },
     });

    }

    function context (contents) {
        return "<div><p>"+ "New:" + "</p>" + contents + "</div>";
    }
    function flush() {
        window.location.href = '/board/message';
    }
</script>
@endsection
