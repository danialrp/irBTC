@if(Auth::check())
    <div class="user-login">
        <div class="login-txt-prof">
            <ul>
                <li><span>کاربر:: </span><span>{{ Auth::user()->nname }}</span></li>
                <li><a href="{{ url('/profile') }}">پروفایل</a></li>
                <li><a href="{{ url('/fund') }}">مدیریت موجودی</a></li>
                <li><a href="{{ url('/trades/history') }}">مبادلات من</a></li>
                <li><a href="{{ url('/bank/irr') }}">حساب ها</a></li>
                <li> | </li>
                <li><a href="{{ url('/auth/logout') }}"> خروج </a></li>
            </ul>
        </div>
    </div>
@else
    <div class="user-login">
        <form class="login-form-small" role="form" method="POST" action="{{ url('/') }}">
            {!! csrf_field() !!}
            <div class="login-txt">
                <input type="email" class="txt-simple" name="email" placeholder="ایمیل" value="{{ old('email') }}">
            </div>
            <div class="login-txt">
                <input type="password" class="txt-simple" name="password" placeholder="کلمه عبور">
            </div>
            <div class="login-txt">
                <button type="submit" id="btn-login" class="btn-simple"> ورود به سیستم </button>
                <ul>
                    <li> <a href="{{ url('/auth/register') }}"> عضویت </a> </li>
                    <li> <a href="{{ url('/password/email') }}"> بازیابی کلمه عبور </a> </li>
                </ul>
            </div>
        </form>
    </div>
@endif

<div id="logo">
    <a href="{{ url('/') }}"> <img src="{{ asset('/image/logo.png') }}" alt="iRBtc"> </a>
</div>