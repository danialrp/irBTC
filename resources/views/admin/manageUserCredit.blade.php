@extends('layout/admin')

@section('title', 'اعتبار کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>کد ملی</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>موجودی ریالی</th>
                <th>افزایش ریالی</th>
                <th>موجودی بیتکوین</th>
                <th>افزایش بیتکوین</th>
                <th>موجودی وب مانی</th>
                <th>افزایش وب مانی</th>
                <th>موجودی پرفکت مانی</th>
                <th>افزایش پرفکت مانی</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="GET" action="{{ url('/iadmin/user/credit/search') }}">

                    <td>::</td>
                    <td><input type="text" class="txt-table" name="national_number" placeholder="" value="{{ old('national_number') }}"></td>
                    <td><input type="text" class="txt-table" name="fname" placeholder="" value="{{ old('fname') }}"></td>
                    <td><input type="text" class="txt-table" name="lname" placeholder="" value="{{ old('lname') }}"></td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($users as $user)
                <tr>
                    <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/user/credit', $user->id) }}">
                        {!! csrf_field() !!}
                        <td>{{ $i++ }}</td>
                        <td class="numbers">{{ $user->national_number }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->nname }}</td>
                        <td class="numbers blue">{{ number_format($user->userBalance[0]->current_balance, 0, '.', ',') }}</td>
                        <td><input type="text" class="txt-table numbers" name="irr_deposit_amount" placeholder="" value="0"></td>
                        <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($user->userBalance[2]->current_balance, 6, '.', ','), 6)), '0') }}</td>
                        <td><input type="text" class="txt-table numbers" name="btc_deposit_amount" placeholder="" value="0"></td>
                        <td class="numbers blue">{{ number_format($user->userBalance[3]->current_balance, 2, '.', ',') }}</td>
                        <td><input type="text" class="txt-table numbers" name="wm_deposit_amount" placeholder="" value="0"></td>
                        <td class="numbers blue">{{ number_format($user->userBalance[4]->current_balance, 2, '.', ',') }}</td>
                        <td><input type="text" class="txt-table numbers" name="pm_deposit_amount" placeholder="" value="0"></td>
                        <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $users->appends(Input::query())->render() !!}
        </div>
    </div>
@stop