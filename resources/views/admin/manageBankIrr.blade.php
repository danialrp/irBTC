@extends('layout/admin')

@section('title', 'حساب کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>نام بانک</th>
                <th>شماره حساب</th>
                <th>شماره کارت</th>
                <th>شماره شبا</th>
                <th>زمان</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="GET" action="{{ url('/iadmin/bank/irr/search') }}">
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="fname" placeholder="" value="{{ old('fname') }}"></td>
                    <td><input type="text" class="txt-table" name="lname" placeholder="" value="{{ old('lname') }}"></td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td><input type="text" class="txt-table" name="bank_name" placeholder="" value="{{ old('bank_name') }}"></td>
                    <td><input type="text" class="txt-table" name="acc_number" placeholder="" value="{{ old('acc_number') }}"></td>
                    <td><input type="text" class="txt-table" name="card_number" placeholder="" value="{{ old('card_number') }}"></td>
                    <td><input type="text" class="txt-table" name="shaba_number" placeholder="" value="{{ old('shaba_number') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($banks as $bank)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $bank->userBank->fname }}</td>
                    <td>{{ $bank->userBank->lname }}</td>
                    <td class="eng-font">{{ $bank->userBank->nname }}</td>
                    <td>{{ $bank->name }}</td>
                    <td class="numbers">{{ $bank->acc_number }}</td>
                    <td class="numbers">{{ $bank->card_number }}</td>
                    <td class="numbers">{{ $bank->shaba_number }}</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($bank->created_fa)) }}</td>
                    <td>{{ $bank->desctiption }}</td>
                    <td>::</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $banks->appends(Input::query())->render() !!}
        </div>
    </div>
@stop