@if(Auth::check())
    <div class="user-login">
        <div class="login-txt-prof">
            <ul>
                <li>کاربر {{ Auth::user()->nname }} :: </li>
                <li><a href="{{ url('/profile') }}">پروفایل</a></li>
                <li><a href="{{ url('/fund') }}">مدیریت موجودی</a></li>
                <li><a href="{{ url('/trades/history') }}">مبادلات</a></li>
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
                    <li> <a href="#"> بازیابی کلمه عبور </a> </li>
                </ul>
            </div>
        </form>
    </div>
@endif

<div id="logo">
    <a href="{{ url('/') }}"> <img src="{{ asset('/image/logo.png') }}" alt="iRBtc"> </a>
</div>
</div>

<div id="menu">
    <ul>
        <li><a class="btn-menu" href="{{ url('/trade/webmoney') }}" > مبادلات وبمانی </a></li>
        <li><a class="btn-menu" href="{{ url('/trade/bitcoin') }}"> مبادلات بیتکوین </a></li>
        <li><a class="btn-menu" href="{{ url('/trade/perfectmoney') }}"> مبادلات پرفکت مانی </a></li>
    </ul>
    <div class="cssload-container"><div class="cssload-speeding-wheel"></div></div>