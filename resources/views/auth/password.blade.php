@extends('layout/main')

@section('title', 'بازیابی کلمه عبور')

@section('content')
    <form id="reset-form" class="form-normal" method="POST" action="/password/email">
        {!! csrf_field() !!}
        <fieldset class="fieldset-normal">
            <legend> بازیابی کلمه عبور </legend>
            <div class="form-normal-content">
                <div class="form-element">
                    <label> ایمیل </label>
                    <input type="email" name="email" class="txt-form-normal txt-simple" placeholder="ایمیل" value="{{old('email')}}" >
                </div>
            </div>
        </fieldset>

        <div class="form-btn">
            <button type="submit" class="btn-form-normal"> ارسال لینک بازیابی </button>
        </div>
    </form>
@stop