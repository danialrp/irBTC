<div class="fund-menu">
    <div class="fund-item">
        <div class="currency-name">
            <label class=""> ریالی </label>
        </div>
        <br>
        <div class="currency-balance-container">
            <label class="currency-balance-title"> موجودی </label>
            <label class="currency-balance numbers">{{ number_format($ir_balance, 0, '.', ',') }}</label>
            <label class="currency-unit"> تومان </label>
        </div>
        <div class="fund-action">
            <ul>
                <li><a class="btn-menu" href="{{ url('/fund/deposit/irr') }}" > افزایش موجودی </a></li>
                <li><a class="btn-menu" href="{{ url('/fund/withdraw/irr') }}"> برداشت موجودی </a></li>
            </ul>
        </div>
    </div>

    <div class="fund-item">
        <div class="currency-name">
            <label class=""> بیتکوین </label>
        </div>
        <br>
        <div class="currency-balance-container">
            <label class="currency-balance-title"> موجودی </label>
            <label class="currency-balance numbers">{{ number_format($bitcoin_balance, 6, '.', ',') }}</label>
            <label class="currency-unit"> بیتکوین </label>
        </div>
        <div class="fund-action">
            <ul>
                <li><a class="btn-menu" href="{{ url('/fund/deposit/btc') }}" > افزایش موجودی </a></li>
                <li><a class="btn-menu" href="{{ url('/fund/withdraw/btc') }}"> برداشت موجودی </a></li>
            </ul>
        </div>
    </div>

    <div class="fund-item">
        <div class="currency-name">
            <label class=""> گزارشات مالی </label>
        </div>
        <div class="currency-balance-container">
            <label class="currency-balance-title">  </label>
            <label class="currency-balance numbers">  </label>
            <label class="currency-unit">  </label>
        </div>
        <div class="fund-action single">
            <ul>
                <li><a class="btn-menu" href="{{ url('/fund/history') }}" > نمایش گزارشات </a></li>
            </ul>
        </div>
    </div>

</div>