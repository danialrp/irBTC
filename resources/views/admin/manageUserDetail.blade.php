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
            <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/user/profile', $user->id) }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نام</td>
                    <td><input type="text" name="fname" class="txt-table-wide" placeholder="" value="{{ $user->fname }}"></td>
                </tr>
                <tr>
                    <td>نام خانوادگی</td>
                    <td><input type="text" name="lname" class="txt-table-wide" placeholder="" value="{{ $user->lname }}"></td>
                </tr>
                <tr>
                    <td><span>*</span><span>نام کاربری</span></td>
                    <td><input type="text" name="nname" class="txt-table-wide" placeholder="" value="{{ $user->nname }}"></td>
                </tr>
                <tr>
                    <td><span>*</span><span>ایمیل</span></td>
                    <td><input type="text" name="email" class="txt-table-wide" placeholder="" value="{{ $user->email }}"></td>
                </tr>
                <tr>
                    <td>کلمه عبور</td>
                    <td><input type="password" class="txt-table-wide" name="password" placeholder="" value=""></td>
                </tr>
                <tr>
                    <td>تلفن</td>
                    <td><input type="text" name="tel" class="txt-table-wide" placeholder="" value="{{ $user->tel }}"></td>
                </tr>
                <tr>
                    <td>موبایل</td>
                    <td><input type="text" name="mobile" class="txt-table-wide" placeholder="" value="{{ $user->mobile }}"></td>
                </tr>
                <tr>
                    <td>آدرس</td>
                    <td><input type="text" name="address" class="txt-table-wide" placeholder="" value="{{ $user->address }}"></td>
                </tr>
                <tr>
                    <td>شماره ملی</td>
                    <td><input type="text" name="national_number" class="txt-table-wide" placeholder="" value="{{ $user->national_number }}"></td>
                </tr>
                <tr>
                    <td>فعال</td>
                    <td>
                        @if($user->active == 1)
                            <input type="radio" name="active" value="1" checked>فعال
                            <input type="radio" name="active" value="0">غیرفعال
                        @elseif($user->active == 0)
                            <input type="radio" name="active" value="1" checked>فعال
                            <input type="radio" name="active" value="0" checked>غیرفعال
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>تایید اکانت</td>
                    <td>
                        @if($user->confirmed == 1)
                            <input type="radio" name="confirmed" value="1" checked>تایید
                            <input type="radio" name="confirmed" value="0">عدم تایید
                        @elseif($user->confirmed == 0)
                            <input type="radio" name="confirmed" value="1" checked>تایید
                            <input type="radio" name="confirmed" value="0" checked>عدم تایید
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>آخرین ورود</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($user->login_time)) }}</td>
                </tr>
                <tr>
                    <td>آدرس ip</td>
                    <td class="numbers">{{ $user->ip_address }}</td>
                </tr>
                <tr>
                    <td>تاریخ عضویت</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($user->created_fa)) }}</td>
                </tr>
                <tr>
                    <td>بروزرسانی</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button>
                        <button type="button" id="" class="btn-table" onclick="location.href='/iadmin/user/profile'">بازگشت</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@stop