@extends('layout/profile')

@section('title', 'پروفایل')

@section('content')
    @if(Auth::user()->confirmed == 0)
        <form id="update-info-form" class="form-normal" role="form" method="POST" action="{{ url('/profile') }}">
            {!! csrf_field() !!}
            <fieldset class="fieldset-normal">
                <legend> مشخصات کاربری </legend>
                <div class="form-normal-content">
                    <div class="form-element">
                        <label> نام </label>
                        <input type="text" name="fname" class="txt-form-normal txt-simple" placeholder="نام" value="{{ old('fname') }}" >
                    </div>

                    <div class="form-element">
                        <label> نام خانوادگی </label>
                        <input type="text" name="lname" class="txt-form-normal txt-simple" placeholder="نام خانوادگی" value="{{ old('lname') }}">
                    </div>

                    <div class="form-element">
                        <label> نام کاربری </label>
                        <input type="text" name="nname" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->nname }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> ایمیل </label>
                        <input type="email" name="email" class="txt-form-normal txt-simple" placeholder="آدرس ایمیل" value="{{ Auth::user()->email }}" disabled >
                    </div>

                    <div class="form-element">
                        <label> تلفن </label>
                        <input type="text" name="tel" class="txt-form-normal txt-simple" placeholder="02188888888" value="{{ old('tel') }}">
                    </div>

                    <div class="form-element">
                        <label> موبایل</label>
                        <input type="text" name="mobile" class="txt-form-normal txt-simple" placeholder="09128888888" value="{{ old('mobile') }}">
                    </div>

                    <div class="form-element">
                        <label> شماره ملی </label>
                        <input type="text" name="national_number" class="txt-form-normal txt-simple" placeholder="xxxxxxxxxx" value="{{ old('national_number') }}">
                    </div>

                    <div class="form-element">
                        <label> آدرس </label>
                        <input type="text" name="address" class="txt-form-normal txt-simple" placeholder="آدرس محل سکونت" value="{{ old('address') }}">
                    </div>
                </div>
            </fieldset>

            <div class="lbl-center">
                <label> *لطفا در وارد کردن اطلاعات دقت فرمایید زیرا پس از ثبت و تایید مشخصات قابل تغییر نخواهند بود. </label>
            </div>

            <div class="form-btn">
                <button type="submit" class="btn-form-normal">فعال سازی اکانت</button>
            </div>
        </form>
    @else
        <div id="update-info-form" class="form-normal">
            <fieldset class="fieldset-normal">
                <legend> مشخصات کاربری </legend>
                <div class="form-normal-content">
                    <div class="form-element">
                        <label> نام </label>
                        <input type="text" name="fname" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->fname }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> نام خانوادگی </label>
                        <input type="text" name="lname" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->lname }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> نام کاربری </label>
                        <input type="text" name="nname" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->nname }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> ایمیل </label>
                        <input type="email" name="email" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->email }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> تلفن </label>
                        <input type="text" name="tel" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->tel }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> موبایل</label>
                        <input type="text" name="mobile" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->mobile }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> شماره ملی </label>
                        <input type="text" name="national_number" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->national_number }}" disabled>
                    </div>

                    <div class="form-element">
                        <label> آدرس </label>
                        <input type="text" name="address" class="txt-form-normal txt-simple" placeholder="" value="{{ Auth::user()->address }}" disabled>
                    </div>
                </div>
            </fieldset>
            <div class="lbl-center">
                <label> *در صورت نیاز به تغییر مشخصات لطفا از طریق ایمیل درخواست خود را ارسال فرمایید. </label>
            </div>
        </div>
    @endif
@stop