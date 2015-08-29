@extends('layout/admin')

@section('title', 'پروفایل کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام کاربری</th>
                <th>ایمیل</th>
                <th>شماره ملی</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>فعال</th>
                <th>تایید اکانت</th>
                <th>آخرین ورود</th>
                <th>آدرس ip</th>
                <th>بانک</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_email" placeholder="" value="{{ old('search_email') }}"></td>
                    <td><input type="text" class="txt-table" name="search_national_number" placeholder="" value="{{ old('search_national_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_fname" placeholder="" value="{{ old('search_fname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_lname" placeholder="" value="{{ old('search_lname') }}"></td>
                    <td><select id="" class="fund-dropdown" name="search_active"> <option value="1">فعال</option> <option value="0">غیرفعال</option> </select></td>
                    <td><select id="" class="fund-dropdown" name="search_confirmed"> <option value="1">تایید شده</option> <option value="0">تایید نشده</option> </select></td>
                    <td><input type="text" class="txt-table" name="search_login_time" placeholder="" value="{{ old('search_login_time') }}"></td>
                    <td><input type="text" class="txt-table" name="search_ip_address" placeholder="" value="{{ old('search_ip_address') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <td>1</td>
                <td class="eng-font">Hami_reZa</td>
                <td class="eng-font">test@gmail.com</td>
                <td class="numbers">0928761209</td>
                <td>حمید</td>
                <td>رضایی</td>
                <td>فعال</td>
                <td>تایید شده</td>
                <td class="numbers">94-06-02@04:17</td>
                <td class="numbers">192.168.10.1</td>
                <td><a id="detail-link" href="{{ url('#') }}">حساب ها</a> </td>
                <td><a id="detail-link" href="{{ url('/iadmin/user/profile/1') }}">ویرایش</a> </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop