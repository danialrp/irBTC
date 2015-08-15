@extends('layout/profile')

@section('title', 'مدیریت کلمه عبور')

@section('content')
    <form id="update-password-form" class="form-normal" role="form" method="POST" action="{{ url('/password') }}">
        {!! csrf_field() !!}
        <fieldset class="fieldset-normal">
            <legend> مدیریت کلمه عبور </legend>
            <div class="form-normal-content">
                <div class="form-element">
                    <label> کلمه عبور فعلی </label>
                    <input type="password" name="old_password" class="txt-form-normal txt-simple" placeholder="" >
                </div>

                <div class="form-element">
                    <label> کلمه عبور جدید </label>
                    <input type="password" name="password" class="txt-form-normal txt-simple" placeholder="" >
                </div>

                <div class="form-element">
                    <label> تکرار کلمه عبور جدید </label>
                    <input type="password" name="password_confirmation" class="txt-form-normal txt-simple" placeholder="" >
                </div>
            </div>
        </fieldset>

        <div class="form-btn">
            <button type="submit" class="btn-form-normal"> تغییر کلمه عبور </button>
        </div>
    </form>
@stop