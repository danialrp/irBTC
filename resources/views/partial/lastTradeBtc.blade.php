<div class="last-trades">
    <table id="last-trades-table" class="table-general">
        <thead>
        <tr>
            <th>نوع</th>
            <th>نرخ واحد</th>
            <th>مقدار (بیتکوین)</th>
            <th>مقدار (تومان)</th>
            <th>زمان</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lastTrades as $lastTrade)
            <tr class="last-row">
                @if($lastTrade->type == 1)
                    <td class="green">فروخته شده</td>
                @else
                    <td class="red">خریداری شده</td>
                @endif
                <td class="numbers">{{ number_format($lastTrade->value, 0, '.', ',') }}</td>
                <td class="numbers">{{ rtrim(sprintf('%.8F', round(number_format($lastTrade->amount, 6, '.', ','), 6)), '0') }}</td>
                <td class="numbers">{{ number_format($lastTrade->amount * $lastTrade->value, 0, '.', ',') }}</td>
                <td class="numbers">{{ date('H:i - y/m/d ', strtotime($lastTrade->created_fa)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
