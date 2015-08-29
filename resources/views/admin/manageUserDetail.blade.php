@extends('layout/admin')

@section('title', 'جزییات پروفایل کاربر مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>
            <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نام</td>
                    <td><input type="text" name="fname" class="txt-table-wide" placeholder="" value="محمد"></td>
                </tr>
                <tr>
                    <td>نام خانوادگی</td>
                    <td><input type="text" name="lname" class="txt-table-wide" placeholder="" value="رضایی"></td>
                </tr>
                <tr>
                    <td>نام کاربری</td>
                    <td><input type="text" name="nname" class="txt-table-wide" placeholder="" value="Hamid_xRo"></td>
                </tr>
                <tr>
                    <td>ایمیل</td>
                    <td><input type="text" name="email" class="txt-table-wide" placeholder="" value="testgmail.com"></td>
                </tr>
                <tr>
                    <td>کلمه عبور</td>
                    <td><input type="password" class="txt-table-wide" name="password" placeholder="" value=""></td>
                </tr>
                <tr>
                    <td>تلفن</td>
                    <td><input type="text" name="tel" class="txt-table-wide" placeholder="" value="05198762345"></td>
                </tr>
                <tr>
                    <td>موبایل</td>
                    <td><input type="text" name="mobile" class="txt-table-wide" placeholder="" value="09122349876"></td>
                </tr>
                <tr>
                    <td>آدرس</td>
                    <td><input type="text" name="address" class="txt-table-wide" placeholder="" value="تهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهداتهران خیابان آزادی میدان شهدا"></td>
                </tr>
                <tr>
                    <td>شماره ملی</td>
                    <td><input type="text" name="national_code" class="txt-table-wide" placeholder="" value="0945639871"></td>
                </tr>
                <tr>
                    <td>فعال</td>
                    <td>
                        <input type="radio" name="active" value="فعال">فعال
                        <input type="radio" name="active" value="غیرفعال">غیرفعال
                    </td>
                </tr>
                <tr>
                    <td>تایید اکانت</td>
                    <td>
                        <input type="radio" name="confirm" value="تایید">تایید
                        <input type="radio" name="confirm" value="عدم تایید">عدم تایید
                    </td>
                </tr>
                <tr>
                    <td>آخرین ورود</td>
                    <td class="numbers">1394-06-02@04:17:48</td>
                </tr>
                <tr>
                    <td>آدرس ip</td>
                    <td class="numbers">192.168.10.1</td>
                </tr>
                <tr>
                    <td>تاریخ عضویت</td>
                    <td class="numbers">1394-05-31@22:48:15</td>
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