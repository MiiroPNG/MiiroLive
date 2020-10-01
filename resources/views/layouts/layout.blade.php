<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″ />

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('bgImg/tit.ico')}}" />
    <!--script jQ!-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{asset('extra/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('extra/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>

    <!--basic set-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/basic.css')}}" rel="stylesheet">
    @yield('js-css')

</head>
<style>
    .bg{
        /*抄的chrome的*/
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url("/bgImg/background.jpg");
        opacity: 1;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        left: 0;
        margin: 0;
        padding: 0;
        position: fixed;
        top: 0;
        transition: opacity 700ms;
        width: 100%;
        filter: blur(1px);
        z-index: -100;
    }

</style>
@yield('style')
<body>
<div class="bg"></div>
<!--navbar-->
<nav class="navbar navbar-default">
    <div class="container-fluid  hidden-xs hidden-sm">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url("/")}}" id="brand">Miiro</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="@yield('active1')"><a href="{{url("/")}}" class="a-set">BLOG</a></li>
                <li class="@yield('active2')"><a href="{{url("/storage/checking")}}" class="a-set">STORAGE</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="@yield('active3')"><a href="{{url("/board/message")}}" class="a-set">BOARD</a></li>
                <li class="">
                    <form class="navbar-form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">SEARCH</button>
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid --><!--made by self-->

</nav>
<div class="device-bar" onclick="showBar()">
    <i class="device-i"></i>
    <i class="device-i"></i>
    <i class="device-i"></i>
    <div class="skip">
        <a href="{{url("/")}}"> BLOG</a>
        <hr>
        <a href="{{url("/storage/checking")}}"> STORAGE</a>
        <hr>
        <a href="{{url("/board/message")}}"> BOARD</a>
    </div>
</div>
<!--contains-->
@yield('contains')
<footer id="foot">Designed by Miiro<h6>UI很烂,凑合得了</h6></footer>
@yield('js')
</body>
<script>
    function showBar() {
        $(".skip").fadeToggle(300);
    }
</script>
</html>
