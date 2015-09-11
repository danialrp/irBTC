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
                <form class="" role="form" method="GET" action="{{ url('/iadmin/bank/btc/search') }}">
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="fname" placeholder="" value="{{ old('fname') }}"></td>
                    <td><input type="text" class="txt-table" name="lname" placeholder="" value="{{ old('lname') }}"></td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="btc_address" placeholder="" value="{{ old('btc_address') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($btc_addresses as $btc_address)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $btc_address->userBank->fname }}</td>
                    <td>{{ $btc_address->userBank->lname }}</td>
                    <td class="eng-font">{{ $btc_address->userBank->nname }}</td>
                    <td>{{ $btc_address->name }}</td>
                    <td class="numbers">{{ $btc_address->acc_number }}</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($btc_address->created_fa)) }}</td>
                    <td>{{ $btc_address->description }}</td>
                    <td>::</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $btc_addresses->appends(Input::query())->render() !!}
        </div>
    </div>
@stop