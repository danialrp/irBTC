@extends('layout/admin')

@section('title', 'جزییات مبادله مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>مبادله ۱</th>
                <th>مبادله ۲</th>
                <th>مقدار</th>
                <th>زمان</th>
                <th>یادداشت</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($tradeDetails as $tradeDetail)
            <tr>
                <td class="numbers">{{ $i++ }}</td>
                <td class="numbers">{{ $tradeDetail->trade1Detail->reference_number }}</td>
                <td class="numbers">{{ $tradeDetail->trade2Detail->reference_number }}</td>
                <td class="numbers">{{ $tradeDetail->amount }}</td>
                <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($tradeDetail->created_fa)) }}</td>
                <td>{{ $tradeDetail->description }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="center-element">
        <button type="" id="" class="btn-simple" onclick="location.href='/iadmin/trade'">بازگشت</button>
    </div>
@stop