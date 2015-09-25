@extends('layout/profile')

@section('title', 'افزودن کیف پول بیتکوین')

@section('content')
    <div class="history-table-report bank-table">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>آدرس کیف پول</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addresses as $address)
                <tr class="">
                    <td class="numbers">{{ $address->acc_number }}</td>
                    <td>فعال</td>
                    <form id="delete-btc-address" class="form-normal" role="form" method="POST" action="{{ action('UserController@deleteAddressBtc', Crypt::encrypt($address->id)) }}">
                        {!! csrf_field() !!}
                        <td class="td-no-padding"><button type="submit" class="link-button">حذف</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form id="add-address-form" class="form-normal" role="form" method="POST" action="{{ url('/bank/btc') }}">
        {!! csrf_field() !!}
        <fieldset class="fieldset-normal">
            <legend> ثبت کیف پول بیتکوین </legend>
            <div class="form-normal-content">

                <div class="form-element">
                    <label> آدرس بیتکوین </label>
                    <input type="text" name="btc_address" class="txt-form-normal txt-simple" placeholder="14HmXbnCgEnvNVsFQ38YtpMcqtEyruU8zC" value="{{ old('btc_address') }}" >
                </div>

            </div>
        </fieldset>

        <div class="form-btn">
            <button type="submit" class="btn-form-normal"> ثبت کیف پول جدید </button>
        </div>
    </form>
@stop