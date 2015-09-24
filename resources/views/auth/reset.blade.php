@extends('layout/main')

@section('title', 'بازیابی کلمه عبور')

@section('content')
    <form id="reset-password-form" class="form-normal" role="form" method="POST" action="/password/reset">
        {!! csrf_field() !!}
        <input type="hidden" name="token" id="" value="{{ $token }}"/>
        <fieldset class="fieldset-normal">
            <legend> کلمه عبور جدید </legend>
            <div class="form-normal-content">
                <div class="form-element">
                    <label> ایمیل </label>
                    <input type="email" name="email" class="txt-form-normal txt-simple" placeholder="ایمیل" value="{{old('email')}}" >
                </div>

                <div class="form-element">
                    <label> کلمه عبور </label>
                    <input type="password" name="password" class="txt-form-normal txt-simple" placeholder="کلمه عبور" >
                </div>

                <div class="form-element">
                    <label> تکرار کلمه عبور </label>
                    <input type="password" name="password_confirmation" class="txt-form-normal txt-simple" placeholder="تکرار کلمه عبور" >
                </div>

            </div>
        </fieldset>

        <div class="form-btn">
            <button type="submit" class="btn-form-normal"> ذخیره کلمه عبور </button>
        </div>
    </form>
@stop