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
                <th>ایمیل</th>
                <th>کلمه عبور</th>
                <th>تلفن</th>
                <th>موبایل</th>
                <th>آدرس</th>
                <th>شماره ملی</th>
                <th>فعال</th>
                <th>تایید اکانت</th>
                <th>آخرین ورود</th>
                <th>آدرس ip</th>
                <th>تاریخ عضویت</th>
                <th>ویرایش</th>
                <th>بروزرسانی</th>
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
                    <td><input type="text" class="txt-table" name="search_email" placeholder="" value="{{ old('search_email') }}"></td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_tel" placeholder="" value="{{ old('search_tel') }}"></td>
                    <td><input type="text" class="txt-table" name="search_mobile" placeholder="" value="{{ old('search_mobile') }}"></td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_national_number" placeholder="" value="{{ old('search_national_number') }}"></td>
                    <td><select id="" class="fund-dropdown" name="search_active"> <option value="1">فعال</option> <option value="0">غیرفعال</option> </select></td>
                    <td><select id="" class="fund-dropdown" name="search_confirmed"> <option value="1">تایید شده</option> <option value="0">تایید نشده</option> </select></td>
                    <td><input type="text" class="txt-table" name="search_login_time" placeholder="" value="{{ old('search_login_time') }}"></td>
                    <td><input type="text" class="txt-table" name="search_ip_address" placeholder="" value="{{ old('search_ip_address') }}"></td>
                    <td><input type="text" class="txt-table" name="search_created_fa" placeholder="" value="{{ old('search_created_fa') }}"></td>
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
                    <td>test@gmail.com</td>
                    <td><input type="password" class="txt-table" name="password" placeholder="" value=""></td>
                    <td class="numbers">02198762346</td>
                    <td class="numbers">09139871265</td>
                    <td>تهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهدا</td>
                    <td class="numbers">0928761209</td>
                    <td>
                        <input type="radio" name="active" value="فعال">فعال
                        <input type="radio" name="active" value="غیرفعال">غیرفعال
                    </td>
                    <td>
                        <input type="radio" name="confirm" value="تایید">تایید
                        <input type="radio" name="confirm" value="عدم تایید">عدم تایید
                    </td>
                    <td class="numbers">1394-06-02 04:17:48</td>
                    <td class="numbers">192.168.10.1</td>
                    <td class="numbers">1394-05-31 22:48:15</td>
                    <td><a id="edit-profile-link" href="http://google.com" onclick="editProfile(1)">ویرایش</a> </td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@stop