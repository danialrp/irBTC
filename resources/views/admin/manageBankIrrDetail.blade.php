@extends('layout/admin')

@section('title', 'ویرایش حساب بانک مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>بانک</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>
            <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                {!! csrf_field() !!}
                <tr>
                    <td>نام</td>
                    <td>علیرضا</td>
                </tr>
                <tr>
                    <td>نام خانوادگی</td>
                    <td>محمدی</td>
                </tr>
                <tr>
                    <td>نام کاربری</td>
                    <td class="eng-font">Hami_reZa</td>
                </tr>
                <tr>
                    <td>نام بانک</td>
                    <td>
                        <select name="bank_name" class="">
                            <option value="">نام بانک</option>
                            <option value="بانک ملت">بانک ملت</option>
                            <option value="بانک سامان">بانک سامان</option>
                            <option value="بانک ملی">بانک ملی</option>
                            <option value="بانک پارسیان">بانک پارسیان</option>
                            <option value="بانک پاسارگاد">بانک پاسارگاد</option>
                            <option value="بانک کشاورزی">بانک کشاورزی</option>
                            <option value="بانک اقتصاد نوین">بانک اقتصاد نوین</option>
                            <option value="بانک تجارت">بانک تجارت</option>
                            <option value="بانک صادرات">بانک صادرات</option>
                            <option value="بانک مسکن">بانک مسکن</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>شماره حساب</td>
                    <td><input type="text" name="acc_number" class="txt-table-wide" placeholder="" value="927398723700wew"></td>
                </tr>
                <tr>
                    <td>شماره کارت</td>
                    <td><input type="text" name="card_number" class="txt-table-wide" placeholder="" value="6219-8619-9823-0912"></td>
                </tr>
                <tr>
                    <td>شماره شبا</td>
                    <td><input type="text" name="shaba_number" class="txt-table-wide" placeholder="" value="IRR8i87676654321090987"></td>
                </tr>
                <tr>
                    <td>زمان ثبت</td>
                    <td class="numbers">1394-06-02@04:17</td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><input type="text" name="description" class="txt-table-wide" placeholder="" value="حساب بانک"></td>
                </tr>
                <tr>
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