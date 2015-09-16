@extends('layout.profile')

@section('title', 'برداشت موجودی بیتکوین')

@section('content')

    <div id="btc-withdraw">
        @include('partial/fundMenu')
        <div class="fund-info">
            <div class="currency-name">
                <label class=""> برداشت غیرمستقیم </label>
            </div>
            <div class="fund-info-container">
                <form id="btc-withdraw-form" class="" role="form" method="POST" action="{{ url('/fund/withdraw/btc') }}">
                    {!! csrf_field() !!}
                    <div class="fund-info-item">
                        <label> به </label>
                        <div class="fund-info-item-child">
                            <select name="btc_address_select" class="fund-dropdown">
                                <option value="">انتخاب کیف پول بیتکوین</option>
                                @foreach($btc_addresses as $btc_address)
                                    <option value="{{ $btc_address->id }}">{{ $btc_address->acc_number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <label> مقدار (بیتکوین) </label>
                        <div class="fund-info-item-child">
                            <input type="text" class="txt-fund numbers" name="btc_withdraw_amount" placeholder="0" value="{{ old('btc_withdraw_amount') }}">
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <button type="submit" id="btc-withdraw-btn"  class="btn-simple">ثبت درخواست</button>
                    </div>
                </form>

                <div class="hr-tag">
                    <hr>
                </div>

                <div class="fund-info-item fund-info-detail">
                    <ul>
                        <li>حداقل مبلغ برداشت موجودی بیتکوین 0.002 بیتکوین می باشد.</li>
                        <li>برداشت موجودی شامل 0.0001 بیتکوین کارمزد (داخلی شبکه بیتکوین) می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای اعمال افزایش موجودی بیتکوین پس از ۳ تایید می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای برداشت موجودی بیتکوین ۱ ساعت می باشد.</li>
                        <li>قبل از هر عمل انتقال آدرس های بیتکوین را با دقت بررسی نمایید.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@stop