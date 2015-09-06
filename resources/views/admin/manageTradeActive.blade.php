@extends('layout/admin')

@section('title', 'مبادلات فعال مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نوع</th>
                <th>ارز</th>
                <th>نرخ واحد (تومان)</th>
                <th>باقیمانده</th>
                <th>زمان</th>
                <th>توضیحات(#)</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="GET" action="{{ url('/iadmin/trade/active/search') }}">
                    <td>::</td>
                    <td>
                        <select name="kind_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="2">خرید</option>
                            <option value="1">فروش</option>
                        </select>
                    </td>
                    <td>
                        <select name="currency_report" class="fund-dropdown">
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="reference_number" placeholder="" value="{{ old('reference_number') }}"></td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($activeTrades as $activeTrade)
                <tr>
                    <td>{{ $i++ }}</td>
                    @if($activeTrade->type == 1)
                        <td>فروش</td>
                    @elseif($activeTrade->type == 2)
                        <td>خرید</td>
                    @endif
                    <td>بیتکوین</td>
                    <td class="numbers">{{ number_format($activeTrade->value, 0, '.', ',') }}</td>
                    <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($activeTrade->remain, 6, '.', ','), 6)), '0') }}</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($activeTrade->created_fa)) }}</td>
                    <td class="numbers">{{ $activeTrade->description }}</td>
                    <td>::</td>
                </tr>
            @endforeach
            <tr class="bold">
                <td>::</td>
                <td>مجموع</td>
                <td>::</td>
                <td>::</td>
                <td class="numbers">{{ $activeTradesSum }}</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
            </tr>
            </tbody>
        </table>
        <div class="paginate">
            {!! $activeTrades->appends(Input::query())->render() !!}
        </div>
    </div>
@stop