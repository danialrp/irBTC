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
            <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/transaction', $transaction->id) }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نوع</td>
                    <td>{{ $transaction->typeTransaction->fa_name }}</td>
                </tr>
                <tr>
                    <td>شناسه</td>
                    <td class="numbers">{{ $transaction->reference_number }}</td>
                </tr>
                <tr>
                    <td>کاربر</td>
                    <td>{{ $transaction->userTransaction->fname }} {{ $transaction->userTransaction->lname }}
                        <span class="eng-font">({{ $transaction->userTransaction->nname }})</span>
                    </td>
                </tr>
                <tr>
                    <td>ارز</td>
                    <td>{{ $transaction->moneyTransaction->fa_name }}</td>
                </tr>
                <tr>
                    <td>کیف پول بیتکوین کاربر</td>
                    @if($transaction->money == 3)
                        <td>{{ $transaction->bankTransaction->acc_number }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>بانک کاربر</td>
                    @if($transaction->money == 1)
                        <td>{{ $transaction->bankTransaction->name }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>شماره کارت</td>
                    @if($transaction->money == 1)
                        <td>{{ $transaction->bankTransaction->card_number }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>شماره حساب کاربر</td>
                    @if($transaction->money == 1)
                        <td>{{ $transaction->bankTransaction->acc_number }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>شماره شبا کاربر</td>
                    @if($transaction->money == 1)
                        <td>{{ $transaction->bankTransaction->shaba_number }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>به</td>
                    <td>{{ $transaction->to }}</td>
                </tr>
                <tr>
                    <td>مقدار</td>
                    @if($transaction->money == 3)
                        <td>
                            <input type="text" name="btc_deposit_amount" class="txt-table-wide" placeholder=""
                                   value="{{ rtrim(sprintf('%.8F', round(number_format($transaction->amount, 6, '.', ','), 6)), '0') }}">
                        </td>
                    @elseif($transaction->money == 1)
                        <td><input type="text" name="irr_deposit_amount" class="txt-table-wide" placeholder=""
                                   value="{{ number_format($transaction->amount, 0, '.', '') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>کارمزد</td>
                    @if($transaction->money == 3)
                        <td><input type="text" name="fee_amount" class="txt-table-wide" placeholder=""
                                   value="{{ rtrim(sprintf('%.8F', round(number_format($transaction->fee_amount, 6, '.', ','), 6)), '0') }}"></td>
                    @elseif($transaction->money == 1)
                        <td><input type="text" name="fee_amount" class="txt-table-wide" placeholder=""
                                   value="{{ number_format($transaction->fee_amount, 0, '.', ',') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>پیگیری</td>
                    <td class="numbers">{{ $transaction->tracking_number }}</td>
                </tr>
                <tr>
                    <td>وضعیت</td>
                    <td>
                        <select name="status" class="fund-dropdown">
                            @if($transaction->status == 4)
                                <option value="4" selected>معلق</option>
                                <option value="2">تکمیل شده</option>
                                <option value="3">لغو شده</option>
                            @elseif($transaction->status == 2)
                                <option value="4">معلق</option>
                                <option value="2" selected>تکمیل شده</option>
                                <option value="3">لغو شده</option>
                            @elseif($transaction->status == 3)
                                <option value="4">معلق</option>
                                <option value="2">تکمیل شده</option>
                                <option value="3" selected>لغو شده</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>زمان ثبت</td>
                    <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($transaction->created_fa)) }}</td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td class="numbers">{{ $transaction->description }}</td>
                </tr>
                <tr>
                <tr>
                    <td>یادداشت</td>
                    <td><input type="text" name="note" class="txt-table-wide" placeholder="" value="{{ $transaction->note }}"></td>
                </tr>
                <td>بروزرسانی</td>
                <td><button type="submit" id="" class="btn-table">بروزرسانی</button>
                    <button type="button" id="" class="btn-table" onclick="location.href='/iadmin/transaction'">بازگشت</button>
                </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@stop