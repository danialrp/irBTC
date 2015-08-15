<div class="sidebar-container">
    @if(Auth::check())
        <div class="sidebar-section">
            <div class="sidebar-head"> موجودی </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> تومان </label>
                <label id="ir_balance" class="sidebar-element-value numbers blue"><a href="{{ url('/fund/deposit/irr') }}">{{ number_format($ir_balance, 0, '.', ',') }}</a></label>
            </div>,
            <div class="sidebar-element">
                <label class="sidebar-element-title"> بیتکوین </label>
                <label id="btc_balance" class="sidebar-element-value numbers blue"><a href="{{ url('/fund/deposit/btc') }}">{{ number_format($bitcoin_balance, 6, '.', ',') }}</a></label>
            </div>

            {{--<div class="sidebar-element">
                <label class="sidebar-element-title"> وبمانی (دلار) </label>
                <label id="wm_balance" class="sidebar-element-value numbers blue"><a href="{{ url('/fund') }}">{{ number_format($webmoney_balance, 2, '.', ',') }}</a></label>
            </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> پرفکت مانی (دلار) </label>
                <label id="pm_balance" class="sidebar-element-value numbers blue"><a href="{{ url('/fund') }}">{{ number_format($perfectmoney_balance, 2, '.', ',') }}</a></label>
            </div>--}}
        </div>

        <div class="sidebar-section">
            <div class="sidebar-head"> کاربری </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> وضعیت </label>
                @if(Auth::user()->confirmed)
                    <label class="sidebar-element-value"> عادی </label>
                @else
                    <label class="sidebar-element-value red"> تایید نشده </label>
                @endif
            </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> تاریخ ثبت نام </label>
                <label class="sidebar-element-value">{{ date('y/m/d ', strtotime($created_fa)) }}</label>
            </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> آخرین ورود </label>
                <label class="sidebar-element-value">{{ date('y/m/d - H:i ', strtotime($login_time)) }}</label>
            </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> آدرس </label>
                <label class="sidebar-element-value">{{ $ip_address }}</label>
            </div>
        </div>
    @else
        <div class="sidebar-section">
            <div class="sidebar-head"> اطلاعات کاربری </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> برای شروع مبادله لطفا وارد شوید </label>
            </div>
        </div>
    @endif
</div>