@extends('layout/profile')

@section('title', 'مبادلات فعال کاربر')

@section('content')
    <div id="user-active-trades">
        <div class="history-info-container">
            <form id="" class="" role="form" method="POST" action="{{ url('/trades/active') }}">
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
                    <th>نرخ واحد</th>
                    <th>مقدار (بیتکوین)</th>
                    <th>مقدار (تومان)</th>
                    <th>زمان</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($active_trades as $active_trade)
                    <tr class="active-row {{ $active_trade->trade_id }}">
                        @if($active_trade->type == 1)
                            <td class="green">فروش</td>
                        @elseif($active_trade->type == 2)
                            <td class="red">خرید</td>
                        @endif
                        <td class="numbers">{{ number_format($active_trade->value, 0, '.', ',') }}</td>
                        @if($active_trade->money == 3)
                            <td class="act-amount numbers">{{ rtrim(sprintf('%.8F', round(number_format($active_trade->remain, 6, '.', ','), 6)), '0') }} <span> بیتکوین </span></td>
                        @endif
                        <td class="act-total numbers">{{ number_format($active_trade->remain * $active_trade->value, 0, '.', ',') }}</td>
                        <td>{{ date('H:i - y/m/d ', strtotime($active_trade->created_fa)) }}</td>
                        <form id="cancel-trade" class="form-normal" role="form" method="POST" action="{{ action('UserController@cancelActiveTrades', [$active_trade->trade_id]) }}">
                            {!! csrf_field() !!}
                            <td class="td-no-padding"><button type="submit" class="link-button">لغو مبادله</button></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop