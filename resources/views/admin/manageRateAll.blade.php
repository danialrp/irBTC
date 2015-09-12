@extends('layout/admin')

@section('title', 'نرخ ارز مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>پول الکترونیک</th>
                <th>نام لاتین</th>
                <th>نماد</th>
                <th>ضریب</th>
                <th>ضریب جدید</th>
                <th>نرخ فروش</th>
                <th>نرخ فروش جدید</th>
                <th>نرخ خرید</th>
                <th>نرخ خرید جدید</th>
                <th>توضیحات</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($currencies as $currency)
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/rate') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="rate_id" value="{{ Crypt::encrypt($currency->id) }}">
                    <td>{{ $i++ }}</td>
                    <td>{{ $currency->fa_name }}</td>
                    <td class="eng-font">{{ $currency->name }}</td>
                    <td class="eng-font">{{ $currency->symbol }}</td>
                    <td class="numbers blue">{{ floatval($currency->rate) }}</td>
                    <td><input type="text" class="txt-table numbers" name="rate_value" placeholder="" value="{{ floatval($currency->rate) }}"></td>
                    <td class="numbers blue">{{ floatval($currency->sell_rate) }}</td>
                    <td><input type="text" class="txt-table numbers" name="sell_rate_value" placeholder="" value=""></td>
                    <td class="numbers blue">{{ floatval($currency->buy_rate) }}</td>
                    <td><input type="text" class="txt-table numbers" name="buy_rate_value" placeholder="" value=""></td>
                    <td>{{ $currency->description }}</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $currencies->appends(Input::query())->render() !!}
        </div>
    </div>
@stop