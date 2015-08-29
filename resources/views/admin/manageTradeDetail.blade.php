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
            <tr>
                <td class="numbers">1</td>
                <td class="numbers">98975644</td>
                <td class="numbers">98975644</td>
                <td class="numbers">0.00023</td>
                <td class="numbers">1394-06-02@04:17:48</td>
                <td>کسر کارمزد</td>
            </tr>
            <tr>
                <td>2</td>
                <td class="numbers">98975644</td>
                <td class="numbers">6145254</td>
                <td class="numbers">0.982310</td>
                <td class="numbers">1394-06-02@04:17:48</td>
                <td>ثبت مبادله توسط سیستم</td>
            </tr>
            <tr>
                <td>3</td>
                <td class="numbers">98975644</td>
                <td class="numbers">5562432</td>
                <td class="numbers">0.00231</td>
                <td class="numbers">1394-06-02@04:17:48</td>
                <td>ثبت مبادله توسط سیستم</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="center-element">
        <button type="" id="" class="btn-simple">بازگشت</button>
    </div>
@stop