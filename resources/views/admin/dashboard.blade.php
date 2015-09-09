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
                <td class="numbers">{{ $dashboard['users'] }}</td>
            </tr>
            <tr>
                <td>کاربران تایید شده</td>
                <td class="numbers">{{ $dashboard['usersConfirmed'] }}</td>
            </tr>
            <tr>
                <td>کاربران جدید</td>
                <td class="numbers">{{ $dashboard['newUsers'] }}</td>
            </tr>
            <tr>
                <td>واریز ریالی (تومان)</td>
                <td class="numbers blue">{{ number_format($dashboard['irrTotalDeposit'], 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>برداشت ریالی (تومان)</td>
                <td class="numbers red">{{ number_format($dashboard['irrTotalWithdraw'], 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>گردش ریالی (تومان)</td>
                <td class="numbers blue">{{ number_format($dashboard['irrTotalTurnover'], 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>تعداد تراکنش ریالی امروز</td>
                <td class="numbers">{{ $dashboard['irrTodayTransactions'] }}</td>
            </tr>
            <tr>
                <td>تعداد کل تراکنش ریالی</td>
                <td class="numbers">{{ $dashboard['irrAllTransactions'] }}</td>
            </tr>
            <tr>
                <td>واریز بیتکوین</td>
                <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['btcTotalDeposit'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>برداشت بیتکوین</td>
                <td class="numbers red">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['btcTotalWithdraw'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>گردش بیتکوین</td>
                <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['btcTotalTurnover'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>تعداد تراکنش بیتکوین امروز</td>
                <td class="numbers">{{ $dashboard['btcTodayTransactions'] }}</td>
            </tr>
            <tr>
                <td>تعداد کل تراکنش بیتکوین</td>
                <td class="numbers">{{ $dashboard['btcAllTransactions'] }}</td>
            </tr>
            <tr>
                <td>تعداد مبادلات خرید بیتکوین</td>
                <td class="numbers">{{ $dashboard['btcBuyTrades'] }}</td>
            </tr>
            <tr>
                <td>مجموع مبادلات خرید بیتکوین</td>
                <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['btcTotalBuyTrades'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>تعداد مبادلات فروش بیتکوین</td>
                <td class="numbers">{{ $dashboard['btcSellTrades'] }}</td>
            </tr>
            <tr>
                <td>مجموع مبادلات فروش بیتکوین</td>
                <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['btcTotalSellTrades'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>مجموع کارمزد (تومان)</td>
                <td class="numbers blue">{{ number_format($dashboard['feeAmountIrr'], 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>مجموع کارمزد (بیتکوین)</td>
                <td class="numbers blue">{{ rtrim(sprintf('%.8F', round(number_format($dashboard['feeAmountBtc'], 6, '.', ','), 6)), '0') }}</td>
            </tr>
            <tr>
                <td>کارمزد سیستم(%)</td>
                <td class="numbers">{{ $dashboard['currentFee']->fee_value * 100 }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop