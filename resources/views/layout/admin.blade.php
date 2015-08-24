<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iRBtc - @yield('title')</title>
    <link href="{{asset('/css/back.css')}}" rel="stylesheet">
    <link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet">
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
</head>

<body>
<div id="page-wrap">
    <div id="header">
        @include('admin/partial/header')
    </div>

    <div id="menu">
        @include('admin/partial/menu')
    </div>

    <div id="main-content">
        @yield('content')
    </div>

    @include('partial/flash-message')

    <div id="footer">
        @include('admin/partial/footer')
    </div>
</div>
</body>