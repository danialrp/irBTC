@extends('layout/admin')

@section('title', 'گزارش های تراکنش مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نوع</th>
                <th>شناسه</th>
                <th>کاربر</th>
                <th>ارز</th>
                <th>حساب کاربر</th>
                <th>به</th>
                <th>مقدار</th>
                <th>کارمزد</th>
                <th>پیگیری</th>
                <th>وضعیت</th>
                <th>زمان</th>
                <th>یادداشت</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td>
                        <select name="kind_report" class="fund-dropdown">
                            <option value="0">همه</option>
                            <option value="2">افزایش</option>
                            <option value="1">برداشت</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="search_reference_number" placeholder="" value="{{ old('search_reference_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td>
                        <select name="search_currency" class="fund-dropdown">
                            <option value="0">همه</option>
                            <option value="1">ریالی</option>
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="search_user_bank" placeholder="" value="{{ old('search_user_bank') }}"></td>
                    <td>
                        <select name="search_our_bank" class="fund-dropdown">
                            <option value="0">همه</option>
                            <option value="1">سامان</option>
                            <option value="2">ملت</option>
                            <option value="3">بیتکوین ۱</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_tracking_number" placeholder="" value="{{ old('search_tracking_number') }}"></td>
                    <td>
                        <select name="search_status" class="fund-dropdown">
                            <option value="0">همه</option>
                            <option value="4">معلق</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="search_created_fa" placeholder="" value="{{ old('search_created_fa') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <td>1</td>
                <td>افزایش</td>
                <td class="numbers">8798675</td>
                <td class="eng-font">Hami_reZa</td>
                <td>ریالی</td>
                <td class="numbers">
                    6219-8619-9823-0912<br>
                    927398723700wew<br>
                    IRR8i87676654321090987
                </td>
                <td>سامان</td>
                <td class="numbers">659,000</td>
                <td class="numbers">0</td>
                <td class="numbers">878867617521765</td>
                <td>معلق</td>
                <td class="numbers">1394-06-02@04:17</td>
                <td></td>
                <td class="numbers">192.198.128.198</td>
                <td><a id="detail-link" href="{{ url('/iadmin/transaction/1') }}">جزییات</a> </td>
            </tr>
            <tr>
                <td>2</td>
                <td>افزایش</td>
                <td class="numbers">8798675</td>
                <td class="eng-font">Hami_reZa</td>
                <td>بیتکوین</td>
                <td class="numbers">14i9iok987yhg2hfgdte890ope0o98736</td>
                <td>بیتکوین ۱</td>
                <td class="numbers">0.002989</td>
                <td class="numbers">000.1</td>
                <td class="numbers"></td>
                <td>تکمیل شده</td>
                <td class="numbers">1394-06-02@04:17</td>
                <td>مشخصات همخوانی ندارد</td>
                <td class="numbers">192.198.128.198</td>
                <td><a id="detail-link" href="{{ url('/iadmin/transaction/1') }}">جزییات</a> </td>
            </tr>
            <tr class="bold">
                <td>::</td>
                <td>مجموع</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td class="numbers">12,980,765</td>
                <td class="numbers">20.980761</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop