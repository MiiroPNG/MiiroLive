<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MakeSuccess</title>
    <link href="{{asset('css/succ.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <script src="{{asset('extra/jquery-3.5.1/jquery-3.5.1.js')}}"></script>

</head>
<style>

</style>
<body>
<canvas id="Mycanvas"></canvas>

<div class="showBox">
    <p>发布成功</p>
    <p id="reMain">点击此处返回</p>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#reMain').click(function () {
            window.location.href = "/";
        })
    })
</script>

<script src="{{asset('extra/canvas/canvas.js')}}"></script>
</html>
