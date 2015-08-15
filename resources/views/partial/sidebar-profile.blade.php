<div class="sidebar-container">
    <div class="sidebar-section">
        <div class="sidebar-head"> پروفایل </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/profile') }}"> ویرایش اطلاعات </a> </label>
        </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/password') }}"> کلمه عبور </a> </label>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-head"> موجودی </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/fund') }}"> مدیریت موجودی </a> </label>
        </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/fund/history') }}"> گزارشات مالی </a> </label>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-head"> مبادلات </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/trades/active') }}"> مبادلات فعال </a> </label>
        </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/trades/history') }}"> گزارش مبادلات </a> </label>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-head"> حساب ها </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/bank/irr') }}"> مدیریت حساب بانک </a> </label>
        </div>

        <div class="sidebar-element">
            <label class="sidebar-element-title"> <a href="{{ url('/bank/btc') }}"> مدیریت کیف پول بیتکوین </a> </label>
        </div>
    </div>

</div>