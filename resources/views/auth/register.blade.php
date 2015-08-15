@extends('layout/main')

@section('title', 'ثبت نام')

@section('content')
    <form id="register-form" class="form-normal" role="form" method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <fieldset class="fieldset-normal">
            <legend> ثبت نام در سیستم </legend>
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
            <button type="submit" class="btn-form-normal"> ثبت نام در سیستم </button>
        </div>
    </form>
@stop