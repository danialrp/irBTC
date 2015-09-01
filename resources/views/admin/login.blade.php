<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iRBtc - ورود</title>
    <link href="{{asset('/css/back.css')}}" rel="stylesheet">
    <link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet">
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
</head>

<body style="background-color: #2C3439 !important;">
<div id="page-wrap" style="background-color: #2C3439 !important;">
    <div class="login-box">
        <div class="login-box-title"> <span class="login-box-title-text"> ورود </span></div>
        <form class="login-box-container" role="form" method="POST" action="{{ url('/iadmin/login') }}">
            {!! csrf_field() !!}
            <div class="login-element">
                <input type="email" class="txt-simple" name="email" placeholder="ایمیل" value="{{ old('email') }}">
            </div>
            <div class="login-element">
                <input type="password" class="txt-simple" name="password" placeholder="کلمه عبور">
            </div>
            <div class="login-element">
                <button type="submit" id="btn-simple" class="btn-simple"> ورود به سیستم </button>
            </div>
        </form>
    </div>
    @include('partial/flash-message')
    @include('admin/partial/footer')
</div>
</body>