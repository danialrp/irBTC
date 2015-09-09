@extends('layout/admin')

@section('title', 'مبادلات مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نوع</th>
                <th>شناسه</th>
                <th>نام کاربری</th>
                <th>ارز</th>
                <th>نرخ واحد (تومان)</th>
                <th>مقدار</th>
                <th>مقدار (تومان)</th>
                <th>کارمزد (تومان)</th>
                <th>باقیمانده</th>
                <th>زمان</th>
                <th>وضعیت</th>
                <th>یادداشت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="GET" action="{{ url('/iadmin/trade/search') }}">
                    <td>::</td>
                    <td>
                        <select name="kind_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="2">خرید</option>
                            <option value="1">فروش</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="reference_number" placeholder="" value="{{ old('reference_number') }}"></td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td>
                        <select name="currency_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>
                        <select name="status_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="1">باز</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($trades as $trade)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $trade->typeTrade->fa_name }}</td>
                    <td class="numbers">{{ $trade->reference_number }}</td>
                    <td class="eng-font">{{ $trade->ownerTrade->nname }}</td>
                    <td>{{ $trade->moneyTrade->fa_name }}</td>
                    <td class="numbers">{{ number_format($trade->value, 0, '.', ',') }}</td>
                    <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($trade->amount, 6, '.', ','), 6)), '0') }}</td>
                    <td class="numbers">{{ number_format($trade->value * $trade->amount, 0, '.', ',') }}</td>
                    <td class="numbers">{{ number_format($trade->fee_amount, 0, '.', ',') }}</td>
                    <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($trade->remain, 6, '.', ','), 6)), '0') }}</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($trade->created_fa)) }}</td>
                    <td>{{ $trade->statusTrade->fa_name }}</td>
                    <td>{{ $trade->description }}</td>
                    <td><a id="detail-link" href="{{ url('/iadmin/trade', $trade->id) }}">جزییات</a> </td>
                </tr>
            @endforeach
            <tr class="bold">
                <td>::</td>
                <td>مجموع</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($totalTrades['totalBtcAmount'], 6, '.', ','), 6)), '0') }}</td>
                <td class="numbers">{{ number_format($totalTrades['totalIrrAmount'], 0, '.', ',') }}</td>
                <td class="numbers">{{ number_format($totalTrades['totalFeeAmount'], 0, '.', ',') }}</td>
                <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($totalTrades['totalRemain'], 6, '.', ','), 6)), '0') }}</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
            </tr>
            </tbody>
        </table>
        <div class="paginate">
            {!! $trades->appends(Input::query())->render() !!}
        </div>
    </div>
@stop