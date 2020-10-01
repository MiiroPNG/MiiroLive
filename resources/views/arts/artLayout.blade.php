@extends('layouts.layout')
@section('title')
    @foreach($thisArt as $a)
        {{$a->articleTitle}}
    @endforeach
@endsection
@section('js-css')
    <link href="{{asset('/css/article.css')}}" rel="stylesheet">
@endsection
@section('contains')
    @foreach($thisArt as $a)
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article>
                        <div class="art-back">
                            <div class="art-title-img">
                                <div>
                                    <img src="{{asset($a->articleImg)}}" alt="">
                                </div>
                                <div class="art-title">
                                    <div></div>
                                    <h3>{{$a->articleTitle}}</h3>
                                </div>
                            </div>
                            <div class="art-contain">
                                {!! $a->articleCon !!}
                                <button class="PNbtn glyphicon glyphicon-arrow-left" id="previous" onclick="$(function() {
                                    window.location.href = '/art/show/{{$previousId}}'
                                    })"></button>
                                <button class="PNbtn glyphicon glyphicon-arrow-right" id="next" onclick="$(function() {
                                    window.location.href = '/art/show/{{$nextId}}'
                                    })"></button>
                            </div>

                        </div>
                    </article>

                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    @endforeach

    <div class="side-control" id="side-control">
        <button onclick="reMain()" id="returnMain" title="返回主页">主页</button>
        <hr>
        <button onclick="topFunction()" id="myBtn" title="回顶部">顶部</button>
    </div>
@endsection
@section('js')
    <script>
        function reMain(){
            window.location.href = "/";
        }
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            console.log("scroll");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("side-control").style.display = "block";
                document.getElementById("myBtn").style.display = "block";
                document.getElementById("returnMain").style.display = "block";
            } else {
                document.getElementById("side-control").style.display = "none";
                document.getElementById("myBtn").style.display = "none";
                document.getElementById("returnMain").style.display = "none";
            }
        }

        // 点击按钮，返回顶部
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        $(function () {
            $nextId = {{$nextId}}
            console.log(typeof $nextId)
            if (!$nextId){
                $('#next').css('display',"none")
                console.log('noNext')
            }else {
            }
        })
    </script>
@endsection
