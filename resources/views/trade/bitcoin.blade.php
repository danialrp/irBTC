@extends('layout/main')

@section('title', 'مبادله بیتکوین')

@section('content')
    <div id="box">
        <div class="trade-box-right">
            <label class="trade-box-title"> فروش بیتکوین </label>
            <form id="sell-btc" class="trade-form" role="form" method="POST" action="{{ url('/trade/bitcoin/sell') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="trade-box-element">
                    <label> مقدار </label>
                    <input type="text" id="sell-amount" class="txt-trade txt-trade-amount numbers" name="sell_amount" placeholder="0.00" >
                    <label> بیتکوین </label>
                </div>

                <div class="trade-box-element">
                    <label> نرخ واحد </label>
                    <input type="text" id="sell-value" class="txt-trade txt-trade-value numbers" name="sell_value" placeholder="0.00" >
                    <label> تومان </label>
                </div>

                <div class="trade-box-element-lbl">
                    <label> مجموع </label>
                    <label id="sell-total" class="lbl-trade numbers"> 0 </label>
                    <label> تومان </label>
                </div>

                <div class="trade-box-element-lbl">
                    <label> کارمزد </label>
                    <label id="sell-fee" class="lbl-trade numbers"> 0 </label>
                    <label> تومان </label>
                </div>

                <hr>

                <label class="trade-box-notice"> مقدار مبادله را محاسبه کنید </label>

                <button type="submit" class="btn-simple btn-trade"> فروش بیتکوین </button>
            </form>

            <button type="submit" id="sell-cal" class="btn-simple btn-calculate"> محاسبه </button>
            <input type="hidden" id="sell-fee-cal" value="{{ $fee->fee_value }}">
        </div>

        <div class="trade-box-left">
            <label class="trade-box-title"> خرید بیتکوین </label>
            <form id="buy-btc" class="trade-form" role="form" method="POST" action="{{ url('/trade/bitcoin/buy') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="trade-box-element">
                    <label> مقدار </label>
                    <input type="text" id="buy-amount" class="txt-trade txt-trade-amount numbers" name="buy_amount" placeholder="0.00" >
                    <label> بیتکوین </label>
                </div>

                <div class="trade-box-element">
                    <label> نرخ واحد </label>
                    <input type="text" id="buy-value" class="txt-trade txt-trade-value numbers" name="buy_value" placeholder="0.00" >
                    <label> تومان </label>
                </div>

                <div class="trade-box-element-lbl">
                    <label> مجموع </label>
                    <label id="buy-total" class="lbl-trade numbers"> 0 </label>
                    <label> تومان </label>
                </div>

                <div class="trade-box-element-lbl">
                    <label> کارمزد </label>
                    <label id="buy-fee" class="lbl-trade numbers"> 0 </label>
                    <label> تومان </label>
                </div>

                <hr>

                <label class="trade-box-notice"> مقدار مبادله را محاسبه کنید </label>

                <button type="submit" class="btn-simple btn-trade"> خرید بیتکوین </button>
            </form>

            <button type="submit" id="buy-cal" class="btn-simple btn-calculate"> محاسبه </button>
            <input type="hidden" id="buy-fee-cal" value="{{ $fee->fee_value }}">
        </div>

        <div id="trade-list">
            @include('/partial/bitcoinTable')
        </div>

    </div>

    <div class="trade-fee-show">
        <label> <span> در حال حاضر کارمزد برای هر مبادله </span> <span> {{ $fee->fee_value * 100 }} </span><span> درصد میباشد. </span> </label>
    </div>

    <div id="active-trades">
        @include('/partial/activeTradeBtc')
    </div>

    <div class=" no-active trade-fee-show">
        <label> <span> هیچ مبادله فعالی وجود ندارد.</span></label>
    </div>
@stop
