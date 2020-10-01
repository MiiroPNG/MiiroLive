<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CabinLogin</title>
    <link rel="stylesheet" href="{{asset('/css/login.css')}}" >
</head>
<style>
    .vc{
        width: 60% !important;
        vertical-align: top;
    }
</style>
<body>
<canvas id="Mycanvas"></canvas>

<div class="login-box">
    <h2>Login</h2>
    <form method="post" id="loginform">
        @csrf
        <div class="user-box">
            <input type="text" name="un" required="" placeholder="用户名">
            <!--label>用户名</label-->
        </div>
        <div class="user-box">
            <input type="password" name="upw" required="" placeholder="密码">
            <!--label>密码</label-->
        </div>
        <div class="user-box">
            <input class="vc" type="text" name="vc" required="" placeholder="验证码">
            <!--label>验证码</label-->
            <img alt="" src="{{asset('/extra/VCode/ValidationCode.php')}}">
        </div>
        @if(session('message'))
            <p>{{session('message')}}</p>
        @endif
        <div class="user-box">
            <a href="#" class="loginSubmit" onclick="document:loginform.submit()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                登录
            </a>
            <b>没有账户？-></b>
            <a href="" class="registerSubmit">注册</a>
        </div>
    </form>
</div>
</body>
<script src="{{asset('/extra/canvas/canvas.js')}}"></script>
</html>
