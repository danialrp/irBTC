<div class="trade-list-right">
    <div class="trade-list-top">
        <div class="trade-list-top-title">
            <label> مبادلات خرید بیتکوین </label>
        </div>
        <div class="trade-list-top-total">
            <label> مجموع </label>
            <label id="total_buy" class="numbers"> {{ number_format($total_buy, 0, '.', ',') }} </label>
            <label> تومان </label>
        </div>
    </div>

    <div class="trade-list-lbl">
        <ul>
            <li> بیتکوین </li>
            <li> نرخ واحد </li>
            <li> تومان </li>
        </ul>
    </div>

    <div class="trade-list-table">
        <table class="trade-table">
            <tbody>
            @foreach($buy_trades as $buy_trade)
                <tr class="t-row buy-row b-{{$buy_trade->id}}" onclick="set_sell( {{ $buy_trade->remain }}, {{ $buy_trade->value }}, {{$fee->fee_value}})">
                    <td class="amount numbers">{{ round(number_format($buy_trade->remain, 6, '.', ','), 6) }}</td>
                    <td class="value numbers">{{ number_format($buy_trade->value, 0, '.', ',') }}</td>
                    <td class="total numbers">{{ number_format($buy_trade->remain * $buy_trade->value, 0, '.', ',') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="trade-list-left">
    <div class="trade-list-top">
        <div class="trade-list-top-title">
            <label> مبادلات فروش بیتکوین </label>
        </div>
        <div class="trade-list-top-total">
            <label> مجموع </label>
            <label id="total_sell" class="numbers"> {{ number_format($total_sell, 0, '.', ',') }} </label>
            <label> تومان </label>
        </div>
    </div>

    <div class="trade-list-lbl">
        <ul>
            <li> بیتکوین </li>
            <li> نرخ واحد </li>
            <li> تومان </li>
        </ul>
    </div>

    <div class="trade-list-table">
        <table class="trade-table">
            <tbody>
            @foreach($sell_trades as $sell_trade)
                <tr class="t-row sell-row s-{{$sell_trade->id}}" onclick="set_buy( {{ $sell_trade->remain }}, {{ $sell_trade->value }}, {{$fee->fee_value}})">
                    <td class="amount numbers">{{ round(number_format($sell_trade->remain, 6, '.', ','), 6) }}</td>
                    <td class="value numbers">{{ number_format($sell_trade->value, 0, '.', ',') }}</td>
                    <td class="total numbers">{{ number_format($sell_trade->remain * $sell_trade->value, 0, '.', ',') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>