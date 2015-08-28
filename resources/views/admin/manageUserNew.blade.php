@extends('layout/admin')

@section('title', 'کاربر جدید مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>* ایمیل</th>
                <th>* کلمه عبور</th>
                <th>تلفن</th>
                <th>موبایل</th>
                <th>آدرس</th>
                <th>شماره ملی</th>
                <th>فعال</th>
                <th>تایید اکانت</th>
                <th>دسترسی</th>
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
                    <td><input type="text" class="txt-table" name="email" placeholder="" value="{{ old('email') }}"></td>
                    <td><input type="password" class="txt-table" name="password" placeholder="" value=""></td>
                    <td><input type="text" class="txt-table" name="tel" placeholder="" value="{{ old('tel') }}"></td>
                    <td><input type="text" class="txt-table" name="mobile" placeholder="" value="{{ old('mobile') }}"></td>
                    <td><input type="text" class="txt-table" name="address" placeholder="" value="{{ old('address') }}"></td>
                    <td><input type="text" class="txt-table" name="national_number" placeholder="" value="{{ old('national_number') }}"></td>
                    <td>
                        <input type="radio" name="active" value="فعال" checked>فعال
                        <input type="radio" name="active" value="غیرفعال">غیرفعال
                    </td>
                    <td>
                        <input type="radio" name="confirm" value="تایید" checked>تایید
                        <input type="radio" name="confirm" value="عدم تایید">عدم تایید
                    </td>
                    <td><select id="" class="fund-dropdown" name="search_confirmed"> <option value="user" selected>کاربر</option> <option value="admin">مدیر</option> </select></td>

                    <td><button type="submit" id="" class="btn-table">ایجاد کاربر جدید</button></td>
                </form>
            </tbody>
        </table>
    </div>
@stop