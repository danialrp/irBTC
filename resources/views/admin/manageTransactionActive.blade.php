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
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
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
                    <td class="numbers">1394-06-02@04:17</td>
                    <td><input type="text" name="fee" class="txt-table" placeholder="" value=""></td>
                    <td>
                        <select name="status" class="fund-dropdown">
                            <option value="4">معلق</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                    <td><button type="submit" id="" class="btn-table">تغییر وضعیت</button></td>
                </form>
            </tr>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
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
                    <td class="numbers">1394-06-02@04:17</td>
                    <td><input type="text" name="fee" class="txt-table" placeholder="" value=""></td>
                    <td>
                        <select name="status" class="fund-dropdown">
                            <option value="4">معلق</option>
                            <option value="2">تکمیل شده</option>
                            <option value="3">لغو شده</option>
                        </select>
                    </td>
                    <td><button type="submit" id="" class="btn-table">تغییر وضعیت</button></td>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@stop