@extends('layout/admin')

@section('title', 'اعتبار کاربران مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>کد ملی</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام کاربری</th>
                <th>موجودی ریالی</th>
                <th>افزایش ریالی</th>
                <th>موجودی بیتکوین</th>
                <th>افزایش بیتکوین</th>
                <th>موجودی وب مانی</th>
                <th>افزایش وب مانی</th>
                <th>موجودی پرفکت مانی</th>
                <th>افزایش پرفکت مانی</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_national_number" placeholder="" value="{{ old('search_national_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_fname" placeholder="" value="{{ old('search_fname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_lname" placeholder="" value="{{ old('search_lname') }}"></td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>1</td>
                    <td class="numbers">0981269823</td>
                    <td>حمید</td>
                    <td>رضایی</td>
                    <td>Hami_reZa</td>
                    <td class="numbers">3,450,000</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">3.9883421</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">0.00</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">0.00</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>2</td>
                    <td class="numbers">0950929845</td>
                    <td>سعید</td>
                    <td>حسن زاده</td>
                    <td>asare</td>
                    <td class="numbers">2,000</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">0.002314</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">230.90</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td class="numbers">30,000.98</td>
                    <td><input type="text" class="txt-table numbers" name="" placeholder="" value="0"></td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@stop