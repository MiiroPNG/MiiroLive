@extends('layouts.layout')
@section('title')
@endsection
@section('js-css')
    <link href="{{asset('/css/article.css')}}" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wangEditor/3.1.1/wangEditor.min.js"></script>
@endsection
@section('contains')
    <h2 class="artMake-title">文章发布</h2>
    <div class="artMake-login-box">
        <form method="post" id="artMakePost" enctype="multipart/form-data">
            @csrf
            <div class="artMake-user-box">
                <input type="text" placeholder="标题" name="artTitle">
            </div>
            <div class="artMake-user-box">
                <input type="text" placeholder="总览" name="artSum">
            </div>
            <input type="file" name="artImg" style="display: none" id="file-load">
            <div class="user-box">
                <div class="btn btn-default btn-lg artMake-btn" id="btn-load">上传TitleImg</div>
                <h4 id="success" style="display: none">题图上传</h4>
            </div>
            <div class="artMake-user-box">
                <input type="text" placeholder="tags" name="artTags">
            </div>
            <div class="artMake-user-box">
                <div id="editor">
                    文章内容
                </div>
                <script type="text/javascript">
                    var E = window.wangEditor
                    var editor = new E('#editor')
                    editor.create()
                    editor.txt.html('<p>用 JS 设置的内容</p>')
                </script>
                <input type="hidden" name="artContains" id="artContains">
                <!--script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/ueditor.config.js')}}"></script>
                <script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/ueditor.all.min.js')}}"> </script>
                <script type="text/javascript" charset="utf-8" src="{{asset('/extra/editor/lang/zh-cn/zh-cn.js')}}"></script>
                <script type="text/javascript">
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');
                </script>
                <script-- id="editor" type="text/plain" style="width:700px;height:300px;" name="artContains"></script-->
            </div>
            <input type="hidden" name="cons" id="cons" value="">
            <div class="artMake-user-box">
                <a href="#" class="art-loginSubmit" onclick="formSub()">
                    提交
                </a>
            </div>
            <div class="artMake-hr"></div>
        </form>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn-load").click(function(){
                $("#file-load").click();
                setTimeout(function () {
                    $("#success").css('display','inline-block');
                },1000)
            });
        });
        $(function () {

        })
        function numberTest() {
            document.getElementById('cons').value = UE.getEditor('editor').getContentTxt();
            document.getElementById('c').value = artl;
        }

        function formSub() {
            //document.getElementById('cons').value = editor.txt.text();
            $('#cons').val(editor.txt.text())
            $('#artContains').val(editor.txt.html())
            //document.getElementById('artContains').value = editor.txt.html();
            document.getElementById('artMakePost').submit();
        }
    </script>
@endsection

