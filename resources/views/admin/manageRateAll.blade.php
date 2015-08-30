@extends('layout/admin')

@section('title', 'نرخ ارز مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>پول الکترونیک</th>
                <th>نام لاتین</th>
                <th>نماد</th>
                <th>ضریب</th>
                <th>نرخ فروش</th>
                <th>نرخ خرید</th>
                <th>توضیحات</th>
                <th>ضریب جدید</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>1</td>
                    <td>تومان</td>
                    <td class="eng-font">Toman</td>
                    <td class="eng-font">T</td>
                    <td class="numbers">4000</td>
                    <td class="numbers">0</td>
                    <td class="numbers">0</td>
                    <td></td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@stop