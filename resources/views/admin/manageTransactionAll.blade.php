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
                <th>نام کاربری</th>
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
                <form class="" role="form" method="GET" action="{{ url('/iadmin/transaction/search') }}">
                    <td>::</td>
                    <td>
                        <select name="kind_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="4">افزایش</option>
                            <option value="5">برداشت</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="reference_number" placeholder="" value="{{ old('reference_number') }}"></td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="nname" placeholder="" value="{{ old('nname') }}"></td>
                    <td>
                        <select name="currency_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="1">ریالی</option>
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="txt-table" name="user_btc_address" placeholder="آدرس بیتکوین" value="{{ old('user_btc_address') }}">
                        <input type="text" class="txt-table" name="user_bank_card" placeholder="شماره کارت" value="{{ old('user_bank_card') }}">
                    </td>
                    <td><input type="text" class="txt-table" name="our_bank" placeholder="" value="{{ old('our_bank') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="tracking" placeholder="" value="{{ old('tracking') }}"></td>
                    <td>
                        <select name="status_report" class="fund-dropdown">
                            <option value="">انتخاب</option>
                            <option value="4">معلق</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <?php $i = 1 ?>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $transaction->typeTransaction->fa_name }}</td>
                    <td class="numbers">{{ $transaction->reference_number }}</td>
                    <td class="eng-font">
                        {{ $transaction->userTransaction->fname }} {{ $transaction->userTransaction->lname }}
                    </td>
                    <td class="eng-font">{{ $transaction->userTransaction->nname }}</td>
                    <td>{{ $transaction->moneyTransaction->fa_name }}</td>
                    @if($transaction->money == 1)
                        <td class="numbers">
                            {{ $transaction->bankTransaction->name }}<span>@</span>{{ $transaction->bankTransaction->card_number }}
                        </td>
                    @elseif($transaction->money == 3)
                        <td class="numbers">
                            {{ $transaction->bankTransaction->acc_number }}
                        </td>
                    @endif
                    <td>{{ $transaction->to }}</td>
                    @if($transaction->money == 1)
                        @if($transaction->type == 4)
                            <td class="numbers">
                                <span class="">({{ number_format($transaction->amount, 0, '.', ',') }})</span>
                                <span class="green">{{ number_format($transaction->amount - $transaction->fee_amount, 0, '.', ',') }}</span>
                            </td>
                        @elseif($transaction->type == 5)
                            <td class="numbers">
                                <span class="">({{ number_format($transaction->amount, 0, '.', ',') }})</span>
                                <span class="red">{{ number_format($transaction->amount - $transaction->fee_amount, 0, '.', ',') }}</span>
                            </td>
                        @endif
                        <td class="numbers">{{ number_format($transaction->fee_amount, 0, '.', ',') }}</td>
                    @elseif($transaction->money == 3)
                        @if($transaction->type == 4)
                            <td class="numbers">
                                <span class="">({{ rtrim(sprintf('%.8F', round(number_format($transaction->amount, 6, '.', ','), 6)), '0') }})</span>
                                <span class="green">{{ rtrim(sprintf('%.8F', round(number_format($transaction->amount - $transaction->fee_amount, 6, '.', ','), 6)), '0') }}</span>
                            </td>
                        @elseif($transaction->type == 5)
                            <td class="numbers">
                                <span class="">({{ rtrim(sprintf('%.8F', round(number_format($transaction->amount, 6, '.', ','), 6)), '0') }})</span>
                                <span class="red">{{ rtrim(sprintf('%.8F', round(number_format($transaction->amount - $transaction->fee_amount, 6, '.', ','), 6)), '0') }}</span>
                            </td>
                        @endif
                        <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($transaction->fee_amount, 6, '.', ','), 6)), '0') }}</td>
                    @endif
                    <td class="numbers">{{ $transaction->tracking_number }}</td>
                    <td>{{ $transaction->statusTransaction->fa_name }}</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($transaction->created_fa)) }}</td>
                    <td>{{ $transaction->note }}</td>
                    <td class="numbers">{{ $transaction->description }}</td>
                    <td><a id="detail-link" href="{{ url('/iadmin/transaction', $transaction->id) }}">جزییات</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $transactions->appends(Input::query())->render() !!}
        </div>
    </div>
@stop