<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checking</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" >
</head>
<style>
    .user-box input:nth-child(1){
        border: 0;
        width: 70%;
        margin: 0;
    }
    .user-box input:nth-child(2){
        border: 0;
        width: 20%;
        margin: 0;
    }
</style>
<body>
<canvas id="Mycanvas"></canvas>
<div class="login-box">
    <form>
        <div class="user-box">
            <input type="text" placeholder="CheckingCode" name="code">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
<script src="{{asset('/extra/canvas/canvas.js')}}"></script>
</body>
</html>
