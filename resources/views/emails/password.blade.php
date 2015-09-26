<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: normal;
            colors: #000000;
            width: 600px;
            margin: auto;
        }
        .container {
            text-align: center;
            direction: rtl;
        }
        .title {
            height: 40px;
            background: #1D417A;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
        }
        .title-text {
            line-height: 35px;
        }
        .content {
            background: #f3f3f3;
            width: 100%;
            color: #000000;
            text-align: right;
            direction: rtl;
            overflow: hidden;
        }

        .content p {
            padding: 0px 9px 2px 0px;
        }

        .red {
            color: #851013;
        }
        .footer {
            width: 100%;
            background: #4d4d4d;
            color: #9D9D9D;
            height: 25px;
            text-align: center;
            font-size: 10px;
            line-height: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title"><div class="title-text">::iRBtc::</div></div>
    <div class="content">
        <p>
            <span>با سلام</span> <br/>
            <span>برای بازیابی کلمه عبور خود بر روی لینک زیر کلیک کنید:</span><br/>
            <span>{{ url('password/reset/'.$token) }}</span><br/>
        </p>
        <p class="red">
            <span>مدت زمان اعتبار این لینک تا ۱ ساعت پس از دریافت این ایمیل می باشد.</span><br/>
            <span>این ایمیل به صورت خودکار توسط سیستم برای شما ارسال شده است و از ارسال پاسخ به آن خودداری نمایید.</span>
        </p>
    </div>
</div>
<div class="footer">IRBTC.COM</div>
</div>
</body>
</html>