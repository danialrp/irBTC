@extends('layout/profile')

@section('title', 'افزودن حساب بانک')

@section('content')
    <div class="history-table-report bank-table">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>نام بانک</th>
                <th>شماره کارت</th>
                <th>شماره حساب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($banks as $bank)
            <tr class="">
                <td>{{ $bank->name }}</td>
                <td class="numbers">{{ $bank->card_number }}</td>
                <td class="numbers">{{ $bank->acc_number }}</td>
                <td>فعال</td>
                <td><a href="{{ action('UserController@deleteBankIrr', [$bank->id]) }}"> حذف </a></td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form id="add-bank-form" class="form-normal" role="form" method="POST" action="{{ url('/bank/irr') }}">
        {!! csrf_field() !!}
        <fieldset class="fieldset-normal">
            <legend> ثبت حساب بانکی </legend>
            <div class="form-normal-content">
                <div class="form-element">
                    <label> نام بانک </label>
                    <select name="bank_name" class="bank-dropdown txt-form-normal">
                        <option value="">نام بانک</option>
                        <option value="بانک ملت">بانک ملت</option>
                        <option value="بانک سامان">بانک سامان</option>
                        <option value="بانک ملی">بانک ملی</option>
                        <option value="بانک پارسیان">بانک پارسیان</option>
                        <option value="بانک پاسارگاد">بانک پاسارگاد</option>
                        <option value="بانک کشاورزی">بانک کشاورزی</option>
                        <option value="بانک اقتصاد نوین">بانک اقتصاد نوین</option>
                        <option value="بانک تجارت">بانک تجارت</option>
                        <option value="بانک صادرات">بانک صادرات</option>
                        <option value="بانک مسکن">بانک مسکن</option>
                    </select>
                </div>

                <div class="form-element">
                    <label> شماره کارت </label>
                    <input type="text" name="card_number" class="txt-form-normal txt-simple" placeholder="فرمت نمونه: 5783-1991-8610-6219" value="{{ old('card_number') }}" >
                </div>

                <div class="form-element">
                    <label> شماره حساب </label>
                    <input type="text" name="acc_number" class="txt-form-normal txt-simple" placeholder="مثال: 1-986007-800-9301 یا 2139158268" value="{{ old('acc_number') }}" >
                </div>

                <div class="form-element">
                    <label> شماره شبا </label>
                    <input type="text" name="shaba_number" class="txt-form-normal txt-simple" placeholder="اختیاری" value="{{ old('shaba_number') }}" >
                </div>

            </div>
        </fieldset>

        <div class="form-btn">
            <button type="submit" class="btn-form-normal"> ثبت حساب جدید </button>
        </div>
    </form>
@stop