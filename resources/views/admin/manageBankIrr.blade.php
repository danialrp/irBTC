@extends('layout/admin')

@section('title', 'حساب کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>نام بانک</th>
                <th>شماره حساب</th>
                <th>شماره کارت</th>
                <th>شماره شبا</th>
                <th>زمان</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_fname" placeholder="" value="{{ old('search_fname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_lname" placeholder="" value="{{ old('search_lname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_bank_name" placeholder="" value="{{ old('search_bank_name') }}"></td>
                    <td><input type="text" class="txt-table" name="search_acc_number" placeholder="" value="{{ old('search_acc_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_card_number" placeholder="" value="{{ old('search_card_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_shaba_number" placeholder="" value="{{ old('search_shaba_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_created_fa" placeholder="" value="{{ old('search_created_fa') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <td>1</td>
                <td>علیرضا</td>
                <td>محمدی</td>
                <td class="eng-font">Hami_reZa</td>
                <td>بانک اقتصاد نوین</td>
                <td class="numbers">927398723700wew</td>
                <td class="numbers">6219-8619-9823-0912</td>
                <td class="numbers">IRR8i87676654321090987</td>
                <td class="numbers">1394-06-02@04:17</td>
                <td>حساب بانک</td>
                <td><a id="detail-link" href="{{ url('/iadmin/bank/irr/1') }}">ویرایش</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop