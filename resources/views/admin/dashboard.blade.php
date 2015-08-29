@extends('layout/admin')

@section('title', 'داشبورد مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <th>عنوان</th>
            <th>گزارش</th>
            </thead>
            <tbody>
            <tr>
                <td>تعداد کل کاربران</td>
                <td class="numbers">72123</td>
            </tr>
            <tr>
                <td>کاربران تایید شده</td>
                <td class="numbers">680</td>
            </tr>
            <tr>
                <td>کاربران جدید</td>
                <td class="numbers">0</td>
            </tr>
            <tr>
                <td>واریز ریالی</td>
                <td class="numbers blue">999,999,999</td>
            </tr>
            <tr>
                <td>برداشت ریالی</td>
                <td class="numbers red">888,888,888</td>
            </tr>
            <tr>
                <td>گردش ریالی</td>
                <td class="numbers blue">999,999,999</td>
            </tr>
            <tr>
                <td>تعداد تراکنش ریالی امروز</td>
                <td class="numbers">98</td>
            </tr>
            <tr>
                <td>تعداد کل تراکنش ریالی</td>
                <td class="numbers">13896</td>
            </tr>
            <tr>
                <td>واریز بیتکوین</td>
                <td class="numbers blue">999.098762</td>
            </tr>
            <tr>
                <td>برداشت بیتکوین</td>
                <td class="numbers red">897.876012</td>
            </tr>
            <tr>
                <td>گردش بیتکوین</td>
                <td class="numbers blue">123,2.098761</td>
            </tr>
            <tr>
                <td>تعداد تراکنش بیتکوین امروز</td>
                <td class="numbers">923.760912</td>
            </tr>
            <tr>
                <td>تعداد کل تراکنش بیتکوین</td>
                <td class="numbers">234</td>
            </tr>
            <tr>
                <td>تعداد مبادلات خرید بیتکوین</td>
                <td class="numbers">987</td>
            </tr>
            <tr>
                <td>مجموع مبادلات خرید بیتکوین</td>
                <td class="numbers blue">7682.981023</td>
            </tr>
            <tr>
                <td>تعداد مبادلات فروش بیتکوین</td>
                <td class="numbers">9000</td>
            </tr>
            <tr>
                <td>مجموع مبادلات فروش بیتکوین</td>
                <td class="numbers blue">9823.987231</td>
            </tr>
            <tr>
                <td>مجموع کارمزد(ریالی)</td>
                <td class="numbers blue">999,999,999</td>
            </tr>
            <tr>
                <td>مجموع کارمزد(بیتکوین)</td>
                <td class="numbers blue">999,999.999999</td>
            </tr>
            <tr>
                <td>کارمزد سیستم(%)</td>
                <td class="numbers">0.4</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop