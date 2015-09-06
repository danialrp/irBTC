@extends('layout/admin')

@section('title', 'پروفایل کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>کاربر</th>
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
                <form class="" role="form" method="GET" action="{{ url('/iadmin/user/profile/search') }}">
                    <td>::</td>
                    <td>
                        <select id="" class="fund-dropdown" name="role">
                            <option value="">انتخاب</option>
                            <option value="2">کاربر</option>
                            <option value="1">مدیر</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td><input type="text" class="txt-table" name="email" placeholder="" value="{{ old('email') }}"></td>
                    <td><input type="text" class="txt-table" name="national_number" placeholder="" value="{{ old('national_number') }}"></td>
                    <td><input type="text" class="txt-table" name="fname" placeholder="" value="{{ old('fname') }}"></td>
                    <td><input type="text" class="txt-table" name="lname" placeholder="" value="{{ old('lname') }}"></td>
                    <td>
                        <select id="" class="fund-dropdown" name="active">
                            <option value="">انتخاب</option>
                            <option value="1">فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </td>
                    <td>
                        <select id="" class="fund-dropdown" name="confirmed">
                            <option value="">انتخاب</option>
                            <option value="1">تایید شده</option>
                            <option value="0">تایید نشده</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="ip_address" placeholder="" value="{{ old('ip_address') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    @if($user->role == 2)
                        <td>کاربر</td>
                    @elseif($user->role == 1)
                        <td>مدیر</td>
                    @endif
                    <td class="eng-font">{{ $user->nname }}</td>
                    <td class="eng-font">{{ $user->email }}</td>
                    <td class="numbers">{{ $user->national_number }}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    @if($user->active == 1)
                        <td>فعال</td>
                    @elseif($user->acitve == 0)
                        <td class="red">غیرفعال</td>
                    @endif
                    @if($user->confirmed == 1)
                        <td>تایید شده</td>
                    @elseif($user->confirmed == 0)
                        <td class="red">تایید نشده</td>
                    @endif
                    <td class="numbers">{{ date('y/m/d@H:i', strtotime($user->login_time)) }}</td>
                    <td class="numbers">{{ $user->ip_address }}</td>
                    <td><a id="detail-link" href="{{ url('#') }}">حساب ها</a> </td>
                    <td><a id="detail-link" href="{{ url('/iadmin/user/profile', $user->id) }}">ویرایش</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $users->appends(Input::query())->render() !!}
        </div>
    </div>
@stop