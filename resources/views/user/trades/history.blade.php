@extends('layout/profile')

@section('title', 'مشاهده مبادلات')

@section('content')
    <div id="user-all-trades">
        <div class="history-info-container">
            <form id="" class="" role="form" method="POST" action="{{ url('/trades/history') }}">
                {!! csrf_field() !!}
                <div class="fund-info-item-child">
                    <select name="currency_report" class="fund-dropdown">
                        <option value="3">بیتکوین</option>
                    </select>

                    <select name="kind_report" class="fund-dropdown">
                        <option value="0">همه</option>
                        <option value="2">خرید</option>
                        <option value="1">فروش</option>
                    </select>

                    <select name="status_report" class="fund-dropdown">
                        <option value="0">همه</option>
                        <option value="2">تکمیل شده</option>
                        <option value="3">لغو شده</option>
                    </select>

                    <div class="">
                        <button type="submit" id="fund-history-btn"  class="btn-simple">مشاهده</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="history-table-report">
            <table id="active-trades-table" class="table-general">
                <thead>
                <tr>
                    <th>نوع</th>
                    <th>شناسه</th>
                    <th>نرخ واحد</th>
                    <th>مقدار</th>
                    <th>مقدار (تومان)</th>
                    <th>کارمزد (تومان)</th>
                    <th>زمان</th>
                    <th>وضعیت</th>
                    <th>یادداشت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trades as $trade)
                    <tr class="active-row {{ $trade->trade_id }}">
                        @if($trade->type == 1)
                            <td class="green">فروش</td>
                        @elseif($trade->type == 2)
                            <td class="red">خرید</td>
                        @endif
                        <td class="numbers">{{ $trade->reference_number }}</td>
                        <td class="numbers">{{ number_format($trade->value, 0, '.', ',') }}</td>
                        @if($trade->money == 3)
                            <td class="act-amount numbers">{{ rtrim(sprintf('%.8F', round(number_format($trade->amount, 6, '.', ','), 6)), '0') }} <span> بیتکوین </span></td>
                        @endif
                        <td class="act-total numbers">{{ number_format($trade->amount * $trade->value, 0, '.', ',') }}</td>
                        <td class="numbers">{{ $trade->fee_amount }}</td>
                        <td>{{ date('H:i - y/m/d ', strtotime($trade->created_fa)) }}</td>
                        <td>{{ $trade->statusTrade->fa_name }} <span>({{ rtrim(sprintf('%.8F', round(number_format($trade->remain, 6, '.', ','), 6)), '0') }})</span></td>
                        <td>{{ $trade->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop