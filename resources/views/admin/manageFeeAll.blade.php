@extends('layout/admin')

@section('title', 'کارمزد سیستم مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>مقدار کارمزد</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>کارمزد مبادله</td>
                <td class="numbers">0.004</td>
                <td></td>
                <td><a id="detail-link" href="{{ url('/iadmin/fee/1') }}">ویرایش</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop