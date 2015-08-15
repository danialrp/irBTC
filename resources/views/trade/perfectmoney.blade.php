@extends('layout/main')

@section('title', 'مبادله پرفکت مانی')

@section('content')
    <div class="trade-box-right">
        <label class="trade-box-title"> فروش پرفکت مانی</label>
        <form class="trade-form" role="form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="trade-box-element">
                <label> مقدار </label>
                <input type="text" class="txt-trade txt-trade-amount" name="buy-amount" placeholder="0.00" >
                <label> پرفکت </label>
            </div>

            <div class="trade-box-element">
                <label> نرخ واحد </label>
                <input type="text" class="txt-trade txt-trade-value" name="buy-amount" placeholder="0.00" >
                <label> تومان </label>
            </div>

            <div class="trade-box-element-lbl">
                <label> مجموع </label>
                <label class="lbl-trade"> 1,000,000,000 </label>
                <label> تومان </label>
            </div>

            <div class="trade-box-element-lbl">
                <label> کارمزد </label>
                <label class="lbl-trade"> 1,000,000,000 </label>
                <label> تومان </label>
            </div>

            <hr>

            <label class="trade-box-notice"> مقدار مبادله را محاسبه کنید </label>

            <button type="submit" class="btn-simple btn-trade"> فروش پرفکت  </button>
        </form>

        <button type="submit" class="btn-simple btn-calculate"> محاسبه </button>
    </div>

    <div class="trade-box-left">
        <label class="trade-box-title"> خرید پرفکت مانی </label>
        <form class="trade-form" role="form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="trade-box-element">
                <label> مقدار </label>
                <input type="text" class="txt-trade txt-trade-amount" name="buy-amount" placeholder="0.00" >
                <label> پرفکت </label>
            </div>

            <div class="trade-box-element">
                <label> نرخ واحد </label>
                <input type="text" class="txt-trade txt-trade-value" name="buy-amount" placeholder="0.00" >
                <label> تومان </label>
            </div>

            <div class="trade-box-element-lbl">
                <label> مجموع </label>
                <label class="lbl-trade"> 1,000,000,000 </label>
                <label> تومان </label>
            </div>

            <div class="trade-box-element-lbl">
                <label> کارمزد </label>
                <label class="lbl-trade"> 1,000,000,000 </label>
                <label> تومان </label>
            </div>

            <hr>

            <label class="trade-box-notice"> مقدار مبادله را محاسبه کنید </label>

            <button type="submit" class="btn-simple btn-trade"> خرید پرفکت </button>
        </form>

        <button type="submit" class="btn-simple btn-calculate"> محاسبه </button>
    </div>

    <div class="trade-list-right">
        <div class="trade-list-top">
            <div class="trade-list-top-title">
                <label> مبادلات فروش پرفکت مانی </label>
            </div>
            <div class="trade-list-top-total">
                <label> مجموع </label>
                <label> 10,000,000,000 </label>
                <label> تومان </label>
            </div>
        </div>

        <div class="trade-list-lbl">
            <ul>
                <li> مقدار </li>
                <li> نرخ واحد </li>
                <li> تومان </li>
            </ul>
        </div>

        <div class="trade-list-table">
            <table class="trade-table">
                <tbody>
                <tr>
                    <td> 100 </td>
                    <td> 2,390 </td>
                    <td> 145,000 </td>
                </tr>

                <tr><td> 2,000 </td><td> 3,240 </td><td> 900,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="trade-list-left">
        <div class="trade-list-top">
            <div class="trade-list-top-title">
                <label> مبادلات خرید پرفکت مانی </label>
            </div>
            <div class="trade-list-top-total">
                <label> مجموع </label>
                <label> 1,000 </label>
                <label> تومان </label>
            </div>
        </div>

        <div class="trade-list-lbl">
            <ul>
                <li> مقدار </li>
                <li> نرخ واحد </li>
                <li> تومان </li>
            </ul>
        </div>

        <div class="trade-list-table">
            <table class="trade-table">
                <tbody>
                <tr>
                    <td> 100 </td>
                    <td> 2,390 </td>
                    <td> 145,000 </td>
                </tr>

                <tr><td> 2,000 </td><td> 3,240 </td><td> 900,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 2,000 </td><td> 3,240 </td><td> 900,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 2,000 </td><td> 3,240 </td><td> 900,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 2,000 </td><td> 3,240 </td><td> 900,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 10,000,000,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr><tr><td> 120 </td><td> 3,500 </td><td> 430,000 </td></tr>

                </tbody>
            </table>
        </div>
    </div>

@stop
