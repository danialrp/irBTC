@extends('layout.profile')

@section('title', 'مشاهده پرداخت ها')

@section('content')
    <div id="fund-history">
        <div class="history-info-container">
            <form id="" class="" role="form" method="POST" action="{{ url('/fund/history') }}">
                {!! csrf_field() !!}
                <div class="fund-info-item-child">
                    <select name="currency_report" class="fund-dropdown">
                        <option value="1">ریالی</option>
                        <option value="3">بیتکوین</option>
                    </select>

                    <select name="kind_report" class="fund-dropdown">
                        <option value="0">همه</option>
                        <option value="4">افزایش موجودی</option>
                        <option value="5">برداشت موجودی</option>
                    </select>

                    <select name="status_report" class="fund-dropdown">
                        <option value="0">همه</option>
                        <option value="4">در حال انجام</option>
                        <option value="2">تکمیل شده</option>
                        <option value="3">لغو شده</option>
                    </select>

                    <div class="">
                        <button type="submit" id="fund-history-btn"  class="btn-simple">مشاهده</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="history-table-report">
            <table id="" class="table-general">
                <thead>
                <tr>
                    <th>نوع</th>
                    <th>شناسه</th>
                    <th>زمان</th>
                    <th>مقدار</th>
                    <th>حساب کاربر</th>
                    <th>وضعیت</th>
                    <th>یادداشت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fund_reports as $fund_report)
                    <tr>
                        @if($fund_report->type == 5)
                            <td class="red">{{ $fund_report->typeTransaction->fa_name }}</td>
                        @elseif($fund_report->type == 4)
                            <td class="green">{{ $fund_report->typeTransaction->fa_name }}</td>
                        @endif
                            <td class="numbers">{{ $fund_report->reference_number }}</td>
                            <td>{{ date('H:i - y/m/d ', strtotime($fund_report->created_fa)) }}</td>
                        @if($fund_report->money == 1)
                            <td class="numbers">{{ number_format($fund_report->amount, 0, '.', ',') }} <span> تومان </span></td>
                        @endif
                        @if($fund_report->money == 3)
                            <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($fund_report->amount, 6, '.', ','), 6)), '0') }} <span> بیتکوین </span></td>
                        @endif
                        <td>{{ $fund_report->bankTransaction->name }}</td>
                        <td>{{ $fund_report->statusTransaction->fa_name }}</td>
                        <td>{{ $fund_report->note }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop