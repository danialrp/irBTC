<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" >
    <title>iRBtc - @yield('title')</title>
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet">
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
</head>

<body>
<div id="page-wrap">
    <div id="header">
        @include('partial/header')
    </div>

    <div id="menu">
        @include('partial/mainMenu')
    </div>

    @include('partial/flash-message')

    <div id="sidebar">
        @include('partial/sidebar')
    </div>

    <div id="main-content">
        @yield('content')
    </div>

    <div id="footer">
        @include('partial/footer')
    </div>

</div>
</body>