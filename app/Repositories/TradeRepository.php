<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 7/27/15 AD
 * Time: 2:19 PM
 */

namespace App\Repositories;


use App\ActiveTrade;
use App\Trade;
use Illuminate\Support\Facades\DB;

class TradeRepository {

    /**
     * @return array
     */
    public function showOpenTrade()
    {
        $open_trades = ActiveTrade::where('remain', '>', 0.001)
            ->orderBy('value')
            ->take(40)
            ->get();

        $sell_trades = $open_trades->where('type', 1)
            ->where('money', 3)
            ->sortBy('value')
            ->all();

        $total_sell = 0;
        foreach ($sell_trades as $sell_trade) {
            $temp = $sell_trade->value * $sell_trade->remain;
            $total_sell += $temp;
        }

        $buy_trades = $open_trades->where('type', 2)
            ->where('money', 3)
            ->sortByDesc('value')
            ->all();

        $total_buy = 0;
        foreach ($buy_trades as $buy_trade) {
            $temp = $buy_trade->value * $buy_trade->remain;
            $total_buy += $temp;
        }

        return $trades = [
            'sell_trades' => $sell_trades,
            'total_sell' => $total_sell,
            'buy_trades' => $buy_trades,
            'total_buy' => $total_buy
        ];
    }

    /**
     * @param $money
     * @param $type
     * @return mixed
     */
    public function getSellActiveList($money,$type)
    {
        $tradeList = DB::table('active_trades')
            ->where('money', $money)
            ->where('type', $type)
            ->orderBy('value')
            ->get();
        return $tradeList;
    }

    /**
     * @param $money
     * @param $type
     * @return mixed
     */
    public function getBuyActiveList($money,$type)
    {
        $tradeList = DB::table('active_trades')
            ->where('money', $money)
            ->where('type', $type)
            ->orderBy('value', 'desc')
            ->get();
        return $tradeList;
    }

    public function getUserActiveTrade($id, $money)
    {
        return ActiveTrade::where('owner', $id)
            ->where('money', $money)
            ->select('trade_id', 'type', 'remain', 'value', 'created_fa', 'created_at')
            ->get();
    }

    public function getUserActiveTradeReport($id, $money, $type)
    {
        if($type == [0])
            $type = [1,2];
        return ActiveTrade::where('owner', $id)
            ->whereIn('money', $money)
            ->whereIn('type', $type)
            ->select('trade_id', 'type', 'money', 'remain', 'value', 'created_fa', 'created_at')
            ->orderby('created_at', 'desc')
            ->get();
    }

    public function getUserAllTrades($id, $money, $status, $type)
    {
        if($status == [0])
            $status = [2,3];
        if($type == [0])
            $type = [1,2];
        return Trade::where('owner', $id)
            ->where('money', $money)
            ->whereIn('status', $status)
            ->whereIn('type', $type)
            ->select('reference_number', 'type', 'amount', 'remain', 'value', 'fee_amount', 'status', 'money', 'description', 'created_fa', 'created_at')
            ->orderby('created_at', 'desc')
            ->get();
    }

}