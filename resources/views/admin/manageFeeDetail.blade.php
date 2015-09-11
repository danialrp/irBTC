@extends('layout/admin')

@section('title', 'ویرایش کارمزد مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>کارمزد</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>
            <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/fee', Crypt::encrypt($fee->id)) }}">
                {!! csrf_field() !!}
                <tr>
                    <td>عنوان</td>
                    <td><input type="text" name="fa_name" class="txt-table-wide" placeholder="" value="{{ $fee->fa_name }}"></td>
                </tr>
                <tr>
                    <td>مقدار کارمزد</td>
                    <td><input type="text" name="fee_value" class="txt-table-wide" placeholder="" value="{{ floatval($fee->fee_value) }}"></td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><input type="text" name="description" class="txt-table-wide" placeholder="" value="{{ $fee->description }}"></td>
                </tr>
                <tr>
                    <td>بروزرسانی</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button>
                        <button type="button" id="" class="btn-table" onclick="location.href='/iadmin/fee'">بازگشت</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@stop