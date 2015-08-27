@extends('layout/admin')

@section('title', 'پروفایل کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>کلمه عبور</th>
                <th>تلفن</th>
                <th>موبایل</th>
                <th>آدرس</th>
                <th>شماره ملی</th>
                <th>فعال</th>
                <th>تایید اکانت</th>
                <th>آخرین ورود</th>
                <th>آدرس ip</th>
                <th>عضویت</th>
                <th>ویرایش</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="fname" placeholder="" value="{{ old('fname') }}"></td>
                    <td><input type="text" class="txt-table" name="lname" placeholder="" value="{{ old('lname') }}"></td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td><input type="text" class="txt-table" name="" placeholder="" value="" disabled></td>
                    <td><input type="text" class="txt-table" name="tel" placeholder="" value="{{ old('tel') }}"></td>
                    <td><input type="text" class="txt-table" name="mobile" placeholder="" value="{{ old('mobile') }}"></td>
                    <td><input type="text" class="txt-table" name="address" placeholder="" value="{{ old('address') }}"></td>
                    <td><input type="text" class="txt-table" name="national_number" placeholder="" value="{{ old('national_number') }}"></td>
                    <td><select id="" class="fund-dropdown" name="active"> <option value="1">فعال</option> <option value="0">غیرفعال</option> </select></td>
                    <td><select id="" class="fund-dropdown" name="confirmed"> <option value="1">تایید شده</option> <option value="0">تایید نشده</option> </select></td>
                    <td><input type="text" class="txt-table" name="login_time" placeholder="00:00:00 0000-00-00" value="{{ old('login_time') }}"></td>
                    <td><input type="text" class="txt-table" name="ip_address" placeholder="" value="{{ old('ip_address') }}"></td>
                    <td><input type="text" class="txt-table" name="created_fa" placeholder="00:00:00 0000-00-00" value="{{ old('created_fa') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>1</td>
                    <td>حمید</td>
                    <td>رضایی</td>
                    <td>Hami_reZa</td>
                    <td><input type="password" class="txt-table" name="password" placeholder="" value=""></td>
                    <td>02198762346</td>
                    <td>09139871265</td>
                    <td>تهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهدا</td>
                    <td>0928761209</td>

                    <td><a href="{{ url('#') }}" onclick="">ویرایش</a> </td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@stop