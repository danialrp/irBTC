@extends('layout/admin')

@section('title', 'مبادلات فعال مدیریت')

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
                <th>نرخ واحد (تومان)</th>
                <th>باقیمانده</th>
                <th>زمان</th>
                <th>یادداشت</th>
                <th>بروزرسانی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form class="" role="form" method="POST" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>::</td>
                    <td>
                        <select name="kind_report" class="fund-dropdown">
                            <option value="0">همه</option>
                            <option value="2">خرید</option>
                            <option value="1">فروش</option>
                        </select>
                    </td>
                    <td><input type="text" class="txt-table" name="search_reference_number" placeholder="" value="{{ old('search_reference_number') }}"></td>
                    <td><input type="text" class="txt-table" name="search_nname" placeholder="" value="{{ old('search_nname') }}"></td>
                    <td>
                        <select name="search_currency" class="fund-dropdown">
                            <option value="3">بیتکوین</option>
                        </select>
                    </td>
                    <td>::</td>
                    <td>::</td>
                    <td><input type="text" class="txt-table" name="search_created_fa" placeholder="" value="{{ old('search_created_fa') }}"></td>
                    <td>::</td>
                    <td><button type="submit" id="" class="btn-table">بروزرسانی</button></td>
                </form>
            </tr>
            <tr>
                <form name="" class="" method="POST" role="form" action="{{ url('#') }}">
                    {!! csrf_field() !!}
                    <td>1</td>
                    <td>خرید</td>
                    <td class="numbers">165624466</td>
                    <td>Hami_reZa</td>
                    <td>بیتکوین</td>
                    <td class="numbers">1,200,000</td>
                    <td class="numbers">0.982310</td>
                    <td class="numbers">1394-06-02 04:17:48</td>
                    <td>مبادله توسط کاربر لغو شد.</td>
                    <td>::</td>
                </form>
            </tr>
            <tr class="bold">
                <td>::</td>
                <td>مجموع</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
                <td class="numbers">12.129809</td>
                <td>::</td>
                <td>::</td>
                <td>::</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop