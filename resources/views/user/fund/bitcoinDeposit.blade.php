@extends('layout.profile')

@section('title', 'افزایش موجودی بیتکوین')

@section('content')
    <div id="btc-deposit">
        @include('partial/fundMenu')
        <div class="fund-info">
            <div class="currency-name">
                <label class=""> افزایش غیرمستقیم </label>
            </div>
            <div class="fund-info-container">
                <form id="btc-deposit-form" class="" role="form" method="POST" action="{{ url('/fund/deposit/btc') }}">
                    {!! csrf_field() !!}

                    <div class="fund-info-item">
                        <label> از </label>
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
                            <input type="text" class="txt-fund numbers" name="btc_deposit_amount" placeholder="0" value="{{ old('btc_deposit_amount') }}">
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <label> به </label>
                        <div class="fund-info-item-child">
                            <select id="our-btc-address" class="fund-dropdown" name="our_btc_address">
                                <option value="">انتخاب کیف پول بیتکوین</option>
                                <option value="آدرس بیتکوین">14HmXbnCgEnvNVsFQ38YtpMcqtEyruU8zC</option>
                                {{--<option value="address-2">1NDpZ2wyFekVezssSXv2tmQgmxcoHMUJ7u</option>--}}
                            </select>
                            <label id="btc-address-1">
                                <span>آدرس کیف پول ما: </span>
                                <span class="deposit-info-lbl numbers">14HmXbnCgEnvNVsFQ38YtpMcqtEyruU8zC</span>
                            </label>
                            {{--<label id="btc-address-2">
                                <span>آدرس بیتکوین ما: </span>
                                <span>1NDpZ2wyFekVezssSXv2tmQgmxcoHMUJ7u</span>
                            </label>--}}
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <button type="submit" id="btc-deposit-btn"  class="btn-simple">ثبت درخواست</button>
                    </div>
                </form>

                <div class="hr-tag">
                    <hr>
                </div>

                <div class="fund-info-item fund-info-detail">
                    <ul>
                        <li>افزایش موجودی بیتکوین شامل کارمزد نمی باشد.</li>
                        <li>حداقل مبلغ افزایش موجودی بیتکوین 0.001 بیتکوین می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای اعمال افزایش موجودی بیتکوین پس از ۳ تایید می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای برداشت موجودی بیتکوین ۱ ساعت می باشد.</li>
                        <li>قبل از هر عمل انتقال آدرس های بیتکوین را با دقت بررسی نمایید.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@stop