@extends('layout.profile')

@section('title', 'افزایش موجودی ریالی')

@section('content')

    <div id="irr-deposit">
        @include('partial/fundMenu')
        <div class="fund-info">
            <div class="currency-name">
                <label class=""> افزایش مستقیم (کارت) </label>
            </div>
            <div class="fund-info-container">
                <form id="irr-deposit-form" class="" role="form" method="POST" action="{{ url('/fund/deposit/irr') }}">
                    {!! csrf_field() !!}
                    <div class="fund-info-item">
                        <label> از </label>
                        <div class="fund-info-item-child">
                            <select name="bank_name" class="fund-dropdown">
                                <option value="">انتخاب بانک</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <label> مبلغ (تومان) </label>
                        <div class="fund-info-item-child">
                            <input type="text" class="txt-fund numbers" name="irr_deposit_amount" placeholder="0" value="{{ old('irr_deposit_amount') }}" >
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <label> شماره پیگیری </label>
                        <div class="fund-info-item-child">
                            <input type="text" class="txt-fund numbers" name="tracking_number" placeholder="" value="{{ old('tracking_number') }}" >
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <label> به </label>
                        <div class="fund-info-item-child">
                            <select name="our_banks" id="our-banks" class="fund-dropdown" >
                                <option value="">انتخاب بانک</option>
                                <option value="بانک ملت">بانک ملت</option>
                                <option value="بانک سامان">بانک سامان</option>
                            </select>
                            <label id="mellat-bank-info" class="deposit-info-lbl">
                                {{--<span>بانک ملت -</span>--}}
                                <span>شماره کارت: </span>
                                <span class="numbers">5176-1100-3372-6104</span>
                                <span> -- </span>
                                <span>شماره حساب:</span>
                                <span class="numbers"> 2139158268 </span>
                            </label>
                            <label id="saman-bank-info" class="deposit-info-lbl">
                                {{--<span>بانک سامان - </span>--}}
                                <span>شماره کارت: </span>
                                <span class="numbers">5783-1991-8610-6219</span>
                                <span> -- </span>
                                <span>شماره حساب:</span>
                                <span class="numbers"> 1-986007-800-9301 </span>
                            </label>
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <button type="submit" id="irr-deposit-btn"  class="btn-simple">ثبت درخواست</button>
                    </div>
                </form>

                <div class="hr-tag">
                    <hr>
                </div>

                <div class="fund-info-item fund-info-detail">
                    <ul>
                        <li> افزایش موجودی ریالی شامل کارمزد نمی باشد.</li>
                        <li>حداقل مبلغ افزایش موجودی ریالی 10,000 تومان می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای تراکنشهای ریالی ۱ ساعت می باشد.</li>
                        <li>کلیه حسابها به نام آقای رضوی پناه می باشد.</li>

                    </ul>
                </div>

            </div>
        </div>
    </div>

@stop