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
     * @param $type
     * @param $money
     * @param $status
     * @return mixed
     */
    public function showOpenTrade($type,$money)
    {
        $trade = DB::table('active_trades')
            ->where('type', '=', $type)
            ->where('money', '=', $money)
            ->where('remain', '>', 0.001)
            ->orderBy('value')
            ->take(40)
            ->get();

        return $trade;
    }

    /**
     * @param $type
     * @param $money
     * @return int
     */
    public function totalTrade($type,$money)
    {
        $trades = $this->showOpenTrade($type,$money);
        $total = 0;
        foreach($trades as $trade){
            $temp_sum = $trade->remain * $trade->value;
            $total += $temp_sum;
        }
        return $total;
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