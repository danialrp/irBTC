@extends('layout/main')

@section('title', 'خرید و فروش بیتکوین')

@section('content')
    <div id="box">
        <div class="trade-box-right">
            <div class="trade-box-title"> فروش بیتکوین به ما </div>
            <form id="sell-exchange-btc" class="trade-form" role="form" method="POST" action="{{ url('/exchange/sell') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="exchange-price">
                    <span>نرخ خرید ما/تومان</span>
                    <div class="exchange-sell-price numbers">2,000,000</div>
                </div>

                <div class="exchange-value">
                    <span>مقدار/بیتکوین</span>
                    <div class="exchange-sell-value">
                        <input type="text" class="numbers exchange-value-txt" name="sell_exchange_amount" placeholder="0">
                    </div>
                </div>

                <div class="exchange-total">
                    <span>مجموع/تومان</span>
                    <div class="exchange-total-value">
                        <div class="exchange-sell-price numbers">800,000</div>
                    </div>
                </div>

                <hr>

                <label class="trade-box-notice"> مجموع فروش را محاسبه کنید. </label>

                <button type="submit" class="btn-simple btn-trade"> سفارش فروش </button>
            </form>

            <button type="submit" id="" class="btn-simple btn-calculate"> محاسبه </button>
            <input type="hidden" id="" value="">
        </div>

        <div class="trade-box-left">
            <div class="trade-box-title"> خرید بیتکوین از ما </div>
            <form id="buy-exchange-btc" class="trade-form" role="form" method="POST" action="{{ url('/exchange/buy') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="exchange-price">
                    <span>نرخ فروش ما/تومان</span>
                    <div class="exchange-sell-price numbers">2,000,000</div>
                </div>

                <div class="exchange-value">
                    <span>مقدار/بیتکوین</span>
                    <div class="exchange-sell-value">
                        <input type="text" class="numbers exchange-value-txt" name="buy_exchange_amount" placeholder="0">
                    </div>
                </div>

                <div class="exchange-total">
                    <span>مجموع/تومان</span>
                    <div class="exchange-total-value">
                        <div class="exchange-sell-price numbers">800,000</div>
                    </div>
                </div>

                <hr>

                <label class="trade-box-notice"> مجموع خرید را محاسبه کنید. </label>

                <button type="submit" class="btn-simple btn-trade"> سفارش خرید </button>
            </form>

            <button type="submit" id="buy-cal" class="btn-simple btn-calculate"> محاسبه </button>
            <input type="hidden" id="buy-fee-cal" value="">
        </div>
    </div>

    <div id="last-trade">
        @include('/partial/lastExchangeBtc')
    </div>
@stop