@extends('layouts.layout')
@section('title')
    Miiro | 缓慢更新中
@endsection
@section('js-css')
    <link rel="stylesheet" href="{{asset('extra/APlayer-master/dist/APlayer.min.css')}}">
    <script src="{{asset('extra/APlayer-master/dist/APlayer.min.js')}}"></script>
    <script src="{{asset('extra/hls.min.js')}}"></script>
    <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!--地区统计-->
    <script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/mainJs.js')}}"></script>
@endsection
@section('style')
    <style>
        .video-set{
            padding-top: 5px;
        }
    </style>
@endsection
@section('active1')
    active
@endsection
@section('contains')
    <div class="container center-block device-c">
        <div class="row">
            <!--left-->
            <div class="col-md-8 main-left">
                @foreach($aP as $a)
                    <div class="article-bar">
                        <div class="ifdata">
                            @for($i = 0;$i<sizeof(explode('-',$a->articleDate,5));$i++)
                                @if(explode('-',$a->articleDate,5)[0] != null)
                                @endif
                            @endfor
                            <span style="">{{explode('-',$a->articleDate,5)[0]}}-{{explode('-',$a->articleDate,5)[1]}}</span>
                            <span style="">{{explode('-',$a->articleDate,5)[2]}}</span>
                        </div>
                        <h1>{{$a->articleTitle}}</h1>
                        <!--a class="a-img" href="{{url('/art/show',$a->articleId)}}">
                            <img class="td-img" src="{{$a->articleImg}}" alt="">
                            <div class="con-style">{{$a->articleCon}}</div>
                        </a-->
                        <a class="con-a" href="{{url('/art/show',$a->articleId)}}">
                            <div class="con-style">{{$a->articlePure}}</div>
                        </a>
                        <div class="p-word">
                            <p class="wordx">
                                @for($i = 0;$i<sizeof(explode('/',$a->articleTags,5));$i++)
                                    @if(explode('/',$a->articleTags,5)[0] != null)
                                        <a href="#">
                                            <i class="glyphicon glyphicon-tag" style="vertical-align: center"></i>
                                            {{explode('/',$a->articleTags,5)[$i]}}
                                        </a>
                                    @endif
                                @endfor
                            </p>
                            <p class="word">{{$a->articleSum}}</p>
                        </div>
                    </div>
                    <div class="device-d"></div>
                @endforeach
                {{$aP->appends(['search'=>$searchGet])->links()}}
            </div>
            <div class="col-md-4 main-right">
                <div class="art-sum">
                    <div class="video-set">
                        <div id="player1" class="aplayer"></div>
                    </div>
                    <h4>Recently</h4>
                    <ul class="last-ul">
                        @for($i=0;$i<5;$i++)
                            <li>
                                @if($art[$i]!= null)
                                    <a href="{{url("/art/show",$art[$i]->articleId)}}">
                                        <h3>
                                            {{$art[$i]->articleTitle}}
                                        </h3>
                                        <h6>
                                            {{$art[$i]->articleDate}}
                                        </h6>
                                    </a>
                                @endif
                            </li>
                        @endfor
                    </ul>
                    <hr>
                    <div class="Rbar"></div>
                    <h4>总访问次数:{{$visit->visitTimes}}</h4>
                    <h4 id="Welcome">欢迎访问</h4>
                </div>
                <div class="sjwoo">
                </div>
            </div>
            </div>
        </div>
    <input type="hidden" value="visit" class="visit" id="id1">
@endsection
@section('js')
    <script>
        var ap = new APlayer({
            element: document.getElementById('player1'),
            narrow: false,
            autoplay: true,
            showlrc: false,
            audio: {
                title: '歌に形はないけれど',
                author: 'まらしぃ',
                url: '/video/outputlist.m3u8',
                pic: '/cover/cover1.jpg',
                type: 'hls'
            }
        });
    </script>

@endsection
