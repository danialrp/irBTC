<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 7/27/15 AD
 * Time: 1:05 AM
 */

namespace App\MyClasses;


use App\ActiveTrade;
use App\Fee;
use App\Trade;
use App\TradeDetail;
use Illuminate\Support\Facades\DB;

class TradeDetailClass {

    public function feeAmountOnTradeCreate($trade_id)
    {
        $fee_qr = Fee::findOrFail(1);
        $fee = $fee_qr->fee_value;
        $trade = DB::table('trades')->where('id', $trade_id)->first();
        DB::table('trade_details')->insert([
            'trade1' => $trade->id,
            'trade1_type' => $trade->type,
            'trade2' => $trade->id,
            'trade2_type' => $trade->type,
            'amount' => $fee*$trade->amount,
            'description' => 'کسر کارمزد'
        ]);
    }

    public function createTradeDetail(ActiveTrade $trade1, ActiveTrade $trade2, $amount)
    {
        DB::table('trade_details')->insert([
            'trade1' => $trade1->trade_id,
            'trade1_type' => $trade1->type,
            'trade2' => $trade2->trade_id,
            'trade2_type' => $trade2->type,
            'amount' => $amount,
        ]);
    }

}