@extends('layout/profile')

@section('title', 'مبادلات فعال کاربر')

@section('content')
    <div id="user-active-trades" class="history-table-report">
        <div id="active-trades" class="active-table-report">
            @include('/partial/activeTradeBtc')
        </div>
    </div>
@stop