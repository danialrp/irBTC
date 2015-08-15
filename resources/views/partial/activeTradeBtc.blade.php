@if(Auth::check())
    <div class="active-trades">
        <table id="active-trades-table" class="table-general">
            <thead>
            <tr>
                <th>نوع</th>
                <th>نرخ واحد</th>
                <th>مقدار (بیتکوین)</th>
                <th>مقدار (تومان)</th>
                <th>زمان</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($active_trades as $active_trade)
                <tr class="active-row {{ $active_trade->trade_id }}">
                    @if($active_trade->type == 1)
                        <td>فروش</td>
                    @elseif($active_trade->type == 2)
                        <td>خرید</td>
                    @endif
                    <td class="numbers">{{ number_format($active_trade->value, 0, '.', ',') }}</td>
                    <td class="act-amount numbers">{{ rtrim(sprintf('%.8F', round(number_format($active_trade->remain, 6, '.', ','), 6)), '0') }}</td>
                    <td class="act-total numbers">{{ number_format($active_trade->remain * $active_trade->value, 0, '.', ',') }}</td>
                    <td>{{ date('H:i - y/m/d ', strtotime($active_trade->created_fa)) }}</td>
                    <td><a class="cancel-trade" onclick="cancelTrade({{ $active_trade->trade_id }})" href="#"> لغو مبادله </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif