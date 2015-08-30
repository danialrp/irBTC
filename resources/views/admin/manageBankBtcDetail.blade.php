@extends('layout/admin')

@section('title', 'ویرایش آدرس بیتکوین مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>آدرس کیف پول بیتکوین</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>
            <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نام</td>
                    <td>علیرضا</td>
                </tr>
                <tr>
                    <td>نام خانوادگی</td>
                    <td>محمدی</td>
                </tr>
                <tr>
                    <td>نام کاربری</td>
                    <td class="eng-font">Hami_reZa</td>
                </tr>
                <tr>
                    <td>برچسب آدرس</td>
                    <td><input type="text" name="lable_btc" class="txt-table-wide" placeholder="" value="آدرس بیتکوین"></td>
                </tr>
                <tr>
                    <td>آدرس کیف پول</td>
                    <td><input type="text" name="btc_address" class="txt-table-wide" placeholder="" value="13oi989ueuryhf7uey7rujd8732"></td>
                </tr>
                <tr>
                    <td>زمان ثبت</td>
                    <td class="numbers">1394-06-02@04:17</td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><input type="text" name="description" class="txt-table-wide" placeholder="" value="حساب بیتکوین"></td>
                </tr>
                <tr>
                    <td>بروزرسانی</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button>
                        <button type="" id="" class="btn-table">بازگشت</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@stop