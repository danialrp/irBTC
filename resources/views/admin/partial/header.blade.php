<div class="header-container">
    <div class="header-container-right">
        <div class="header-container-right-element">
            <ul>
                <li><span class="header-container-title">تراکنش های در انتظار تایید</span><span class="numbers blue-sky">{{ $countWaitingPayment }}</span><span class="pipe green"> :: </span></li>
                <li><span class="header-container-title">موجودی ریالی</span><span class="numbers blue-sky">{{ number_format($irrTotalBalance, 0, '.', ',') }}</span><span class="blue-sky"> تومان </span><span class="pipe green"> :: </span></li>
                <li><span class="header-container-title">موجودی بیتکوین</span><span class="numbers blue-sky">{{ rtrim(sprintf('%.8F', round(number_format($btcTotalBalance, 6, '.', ','), 6)), '0')}}</span><span class="pipe green"> :: </span></li>
                <li><span class="header-container-title">موجودی وب مانی</span><span class="numbers blue-sky">{{ number_format($wmTotalBalance, 2, '.', ',') }}</span><span class="blue-sky"> دلار </span><span class="pipe green"> :: </span></li>
                <li><span class="header-container-title">موجودی پرفکت مانی</span><span class="numbers blue-sky">{{ number_format($pmTotalBalance, 2, '.', ',') }}</span><span class="blue-sky"> دلار </span><span class="pipe green"> </span></li>
            </ul>
        </div>
    </div>

    <div class="header-container-left">
        <div class="header-container-left-element">
            <ul>
                <li><span> امروز </span><span class="numbers">{{ $currentTime }}</span></li>
                <li><span> کاربر:: </span><span>{{ Auth::user()->nname }}</span><span class="pipe"> | </span><span><a href="{{ action('AdminAuthController@getLogout') }}"> خروج </a></span></li>
            </ul>
        </div>
    </div>

</div>