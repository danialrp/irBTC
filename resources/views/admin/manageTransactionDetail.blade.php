@extends('layout/admin')

@section('title', 'جزییات تراکنش مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>تراکنش</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>
            <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نوع</td>
                    <td>
                        <input type="radio" name="kind" value="افزایش">افزایش
                        <input type="radio" name="kind" value="برداشت">برداشت
                    </td>
                </tr>
                <tr>
                    <td>شناسه</td>
                    <td><input type="text" name="reference_number" class="txt-table-wide" placeholder="" value="97987843"></td>
                </tr>
                <tr>
                    <td>کاربر</td>
                    <td><input type="text" name="nname" class="txt-table-wide" placeholder="" value="Hamid_xRo"></td>
                </tr>
                <tr>
                    <td>ارز</td>
                    <td>
                        <select name="currency" class="">
                            <option value="1">ریالی</option>
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>کیف پول بیتکوین کاربر</td>
                    <td><input type="text" class="txt-table-wide" name="btc_address" placeholder="" value="128iu8iujhhdgftr737ueyhfyeheyr"></td>
                </tr>
                <tr>
                    <td>بانک کاربر</td>
                    <td><input type="text" class="txt-table-wide" name="bank_name" placeholder="" value="کشاورزی"></td>
                </tr>
                <tr>
                    <td>حساب کاربر</td>
                    <td><input type="text" name="card_number" class="txt-table-wide" placeholder="" value="2376-0987-4510-9081"></td>
                </tr>
                <tr>
                    <td>شماره حساب کاربر</td>
                    <td><input type="text" name="bank_account" class="txt-table-wide" placeholder="" value="23434oi32323"></td>
                </tr>
                <tr>
                    <td>شماره شبا کاربر</td>
                    <td><input type="text" name="shaba_number" class="txt-table-wide" placeholder="" value="IRR0989876453456484859"></td>
                </tr>
                <tr>
                    <td>به</td>
                    <td><input type="text" name="our_bank" class="txt-table-wide" placeholder="" value="بانک سامان"></td>
                </tr>
                <tr>
                    <td>مقدار</td>
                    <td><input type="text" name="amount" class="txt-table-wide" placeholder="" value="0.000349"></td>
                </tr>
                <tr>
                    <td>کارمزد</td>
                    <td><input type="text" name="fee" class="txt-table-wide" placeholder="" value="0.000349"></td>
                </tr>
                <tr>
                    <td>پیگیری</td>
                    <td><input type="text" name="fee" class="txt-table-wide" placeholder="" value="231312w213"></td>
                </tr>
                <tr>
                    <td>وضعیت</td>
                    <td>
                        <select name="status" class="fund-dropdown">
                            <option value="4">معلق</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>زمان ثبت</td>
                    <td class="numbers">1394-06-02@04:17:48</td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td class="numbers">192.168.10.1</td>
                </tr>
                <tr>
                <tr>
                    <td>یادداشت</td>
                    <td><input type="text" name="note" class="txt-table-wide" placeholder="" value=""></td>
                </tr>
                    <td>بروزرسانی</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button>
                        <button type="" id="" class="btn-table">بازگشت</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@stop