@extends('layout/admin')

@section('title', 'کیف پول بیتکوین کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>برچسب آدرس</th>
                <th>آدرس بیتکوین</th>
                <th>زمان</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_fname" placeholder="" value="{{ old('search_fname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_lname" placeholder="" value="{{ old('search_lname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_btc_address" placeholder="" value="{{ old('search_btc_address') }}"></td>
                    <td><input type="text" class="txt-table" name="search_created_fa" placeholder="" value="{{ old('search_created_fa') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <td>1</td>
                <td>علیرضا</td>
                <td>محمدی</td>
                <td class="eng-font">Hami_reZa</td>
                <td>آدرس بیتکوین</td>
                <td class="numbers">13oi989ueuryhf7uey7rujd8732</td>
                <td class="numbers">1394-06-02@04:17</td>
                <td>حساب بیتکوین</td>
                <td><a id="detail-link" href="{{ url('/iadmin/bank/btc/1') }}">ویرایش</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop