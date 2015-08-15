@extends('layout.profile')

@section('title', 'برداشت موجودی ریالی')

@section('content')

    <div id="irr-withdraw">
        @include('partial/fundMenu')
        <div class="fund-info">
            <div class="currency-name">
                <label class=""> برداشت موجودی </label>
            </div>
            <div class="fund-info-container">
                <form id="irr-withdraw-form" class="" role="form" method="POST" action="{{ url('/fund/withdraw/irr') }}">
                    {!! csrf_field() !!}

                    <div class="fund-info-item">
                        <label> به </label>
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
                            <input type="text" class="txt-fund numbers" name="irr_withdraw_amount" placeholder="" value="{{ old('irr_withdraw_amount') }}" >
                        </div>
                    </div>

                    <div class="fund-info-item">
                        <button type="submit" id="irr-withdraw-btn" class="btn-simple">ثبت درخواست</button>
                    </div>
                </form>

                <div class="hr-tag">
                    <hr>
                </div>

                <div class="fund-info-item fund-info-detail">
                    <ul>
                        <li>برداشت موجودی ریالی شامل 900 تومان هزینه کارمزد می باشد.</li>
                        <li>حداکثر زمان ترتیب اثر برای تراکنشهای ریالی ۱ ساعت می باشد.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@stop