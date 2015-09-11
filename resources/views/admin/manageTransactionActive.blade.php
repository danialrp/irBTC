@extends('layout/admin')

@section('title', 'تراکنش های معلق مدیریت')

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
                <th>زمان</th>
                <th>یادداشت</th>
                <th>تعیین وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($activeTransactions as $activeTransaction)
                <tr>
                    <form name="" class="" method="POST" role="form" action="{{ url('/iadmin/transaction/confirm', $activeTransaction->id) }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="reference_number" value="{{ Crypt::encrypt($activeTransaction->reference_number) }}">
                        <td>{{ $i++ }}</td>
                        @if($activeTransaction->type == 4)
                            <td class="green">{{ $activeTransaction->typeTransaction->fa_name }}</td>
                        @elseif($activeTransaction->type == 5)
                            <td class="red">{{ $activeTransaction->typeTransaction->fa_name }}</td>
                        @endif
                        <td class="numbers">{{ $activeTransaction->reference_number }}</td>
                        <td class="eng-font">
                            {{ $activeTransaction->userTransaction->fname }} {{ $activeTransaction->userTransaction->lname }}
                        </td>
                        <td>{{ $activeTransaction->userTransaction->nname }}</td>
                        <td>{{ $activeTransaction->moneyTransaction->fa_name }}</td>
                        @if($activeTransaction->money == 1)
                            <td class="numbers">
                                {{ $activeTransaction->bankTransaction->name }}<span>@</span>{{ $activeTransaction->bankTransaction->card_number }}
                            </td>
                        @elseif($activeTransaction->money == 3)
                            <td class="numbers">
                                {{ $activeTransaction->bankTransaction->acc_number }}
                            </td>
                        @endif
                        <td>{{ $activeTransaction->to }}</td>
                        @if($activeTransaction->money == 1)
                            @if($activeTransaction->type == 4)
                                <td class="numbers">
                                    <span class="">({{ number_format($activeTransaction->amount, 0, '.', ',') }})</span>
                                    <span class="green">{{ number_format($activeTransaction->amount - $activeTransaction->fee_amount, 0, '.', ',') }}</span>
                                </td>
                            @elseif($activeTransaction->type == 5)
                                <td class="numbers">
                                    <span class="">({{ number_format($activeTransaction->amount, 0, '.', ',') }})</span>
                                    <span class="red">{{ number_format($activeTransaction->amount - $activeTransaction->fee_amount, 0, '.', ',') }}</span>
                                </td>
                            @endif
                            <td class="numbers">{{ number_format($activeTransaction->fee_amount, 0, '.', ',') }}</td>
                        @elseif($activeTransaction->money == 3)
                            @if($activeTransaction->type == 4)
                                <td class="numbers">
                                    <span class="">({{ rtrim(sprintf('%.8F', round(number_format($activeTransaction->amount, 6, '.', ','), 6)), '0') }})</span>
                                    <span class="green">{{ rtrim(sprintf('%.8F', round(number_format($activeTransaction->amount - $activeTransaction->fee_amount, 6, '.', ','), 6)), '0') }}</span>
                                </td>
                            @elseif($activeTransaction->type == 5)
                                <td class="numbers">
                                    <span class="">({{ rtrim(sprintf('%.8F', round(number_format($activeTransaction->amount, 6, '.', ','), 6)), '0') }})</span>
                                    <span class="red">{{ rtrim(sprintf('%.8F', round(number_format($activeTransaction->amount - $activeTransaction->fee_amount, 6, '.', ','), 6)), '0') }}</span>
                                </td>
                            @endif
                            <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($activeTransaction->fee_amount, 6, '.', ','), 6)), '0') }}</td>
                        @endif
                        <td class="numbers">{{ $activeTransaction->tracking_number }}</td>
                        <td class="numbers">{{ date('Y/m/d@H:i:s', strtotime($activeTransaction->created_fa)) }}</td>
                        <td><input type="text" name="note" class="txt-table" placeholder="" value="{{ $activeTransaction->note }}"></td>
                        <td>
                            <select name="status_report" class="fund-dropdown">
                                <option value="4" selected>معلق</option>
                                <option value="2">تکمیل شده</option>
                                <option value="3">لغو شده</option>
                            </select>
                        </td>
                        <td><button type="submit" id="" class="btn-table">ذخیره</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $activeTransactions->appends(Input::query())->render() !!}
        </div>
    </div>
@stop