<div id="main-navigation">
    <div class="menu-container">
        <div class="mainBar">
            <div id="menu-1" class="menu-item menu-item-drop">تنظیمات مدیریت</div>
            <div id="menu-2" class="menu-item menu-item-drop">مدیریت کاربران</div>
            <div id="menu-3" class="menu-item menu-item-drop">مدیریت مبادلات</div>
            <div id="menu-4" class="menu-item menu-item-drop">مدیریت پرداخت</div>
            <div id="menu-5" class="menu-item menu-item-drop">حساب های بانک</div>
            <div id="menu-6" class="menu-item menu-item-drop">مدیریت ارزها</div>
        </div>
        <div id="submenu-1" class="sub-menu" >
            <a href="{{ url('/iadmin/dashboard') }}"><p>داشبورد</p></a>
            <a href="{{ url('#') }}"><p>تغییر کلمه عبور</p></a>
            <a href="{{ url('#') }}"><p>گزارشات ورود</p></a>
        </div>
        <div id="submenu-2" class="sub-menu" >
            <a href="{{ url('/iadmin/user/credit') }}"><p>مدیریت اعتبار</p></a>
            <a href="{{ url('/iadmin/user/profile') }}"><p>ویرایش مشخصات</p></a>
            <a href="{{ url('/iadmin/user/new') }}"><p>کاربر جدید</p></a>
        </div>
        <div id="submenu-3" class="sub-menu" >
            <a href="{{ url('/iadmin/trade/active') }}"><p>مبادلات فعال</p></a>
            <a href="{{ url('/iadmin/trade') }}"><p>گزارش مبادلات</p></a>
        </div>
        <div id="submenu-4" class="sub-menu" >
            <a href="{{ url('/iadmin/transaction/active') }}"><p>پرداخت معلق</p></a>
            <a href="{{ url('/iadmin/transaction') }}"><p>گزارشات پرداخت</p></a>
        </div>
        <div id="submenu-5" class="sub-menu" >
            <a href="{{ url('/iadmin/bank') }}"><p>حساب کاربران</p></a>
            <a href="{{ url('/iadmin/bank/new') }}"><p>افزودن حساب جدید</p></a>
        </div>

        <div id="submenu-6" class="sub-menu" >
            <a href="{{ url('#') }}"><p>مدیریت کارمزد</p></a>
            <a href="{{ url('#') }}"><p>قیمت دلار</p></a>
        </div>
    </div>

</div>