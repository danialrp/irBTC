<div class="sidebar-container">
    @if(Auth::check())
        <div class="sidebar-section">
            <div class="sidebar-head"> موجودی </div>
            <div class="sidebar-element">
                <label class="sidebar-element-title"> تومان </label>
                <label id="ir_balance" class="sidebar-element-value numbers blue">{{ number_format($ir_balance, 0, '.', ',') }}</label>
            </div>,
            <div class="sidebar-element">
                <label class="sidebar-element-title"> بیتکوین </label>
                <label id="btc_balance" class="sidebar-element-value numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($bitcoin_balance, 6, '.', ','), 6)), '0') }}</label>
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-head"> کاربری </div>

            <div class="sidebar-element">
                <label class="sidebar-element-title"> وضعیت </label>
                @if(Auth::user()->confirmed)
                    <label class="sidebar-element-value"> عادی </label>
                @else
                    <label class="sidebar-element-value"><a href="{{ url('/profile') }}" class="red">تایید نشده</a></label>
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