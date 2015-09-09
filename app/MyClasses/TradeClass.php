<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 7/24/15 AD
 * Time: 2:42 PM
 */

namespace App\MyClasses;


use App\ActiveTrade;
use App\Balance;
use App\Fee;
use App\Providers\JDateServiceProvider;
use App\Repositories\TradeRepository;
use App\Trade;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TradeClass {

    /**
     * @var TradeDetailClass
     */
    private $tradeDetailClass;
    /**
     * @var TradeRepository
     */
    private $tradeRepository;

    /**
     * @param TradeDetailClass $tradeDetailClass
     * @param TradeRepository $tradeRepository
     */
    public function __construct(TradeDetailClass $tradeDetailClass, TradeRepository $tradeRepository)
    {
        $this->tradeDetailClass = $tradeDetailClass;
        $this->tradeRepository = $tradeRepository;
    }

    /**
     * @param $owner
     * @param $type
     * @param $amount
     * @param $value
     * @param $money
     */
    public function createTrade($owner,$type,$amount,$value,$money)
    {
        if($this->limitActiveTrades($owner, $money)) {
            $fee_qr = Fee::where('id', 1)->first();
            $fee = $fee_qr->fee_value;
            $new_trade = DB::table('trades')->insertGetId([
                'reference_number' => $this->generateReferenceNumber(rand(00000000, 99999999)),
                'owner' => $owner,
                'type' => $type,
                'amount' => $amount,
                'remain' => $amount - $fee * $amount,
                'value' => $value,
                'fee_amount' => $fee * $amount * $value,
                'status' => 1,
                'money' => $money,
                'description' => 'ثبت مبادله توسط کاربر',
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
                'created_at' => Carbon::now()
            ]);
            $this->tradeDetailClass->feeAmountOnTradeCreate($new_trade);
            $this->insertToActiveList($new_trade);
            $this->matchTrade();
            $this->completeTrade();
            return true;
        }
        else
            return false;
    }

    /**
     * @param $rf_number
     * @return int
     */
    public function generateReferenceNumber($rf_number)
    {
        $trade = Trade::where('reference_number', $rf_number)->first();
        while($trade) {
            $rf_number = rand(00000000,99999999);
            $trade = Trade::where('reference_number', $rf_number)->first();
        }
        return $rf_number;
    }

    /**
     * @param $id
     * @param $money
     * @param $type
     * @param $amount
     * @return bool
     */
    public function checkBalance($id,$money,$type,$amount)
    {
        if($type == 1) {
            $balance = Balance::where('owner', $id)->where('money', $money)->first();
            if($balance->current_balance >= $amount) {
                $balance->last_balance = $balance->current_balance;
                $balance->current_balance = $balance->current_balance - $amount;
                $balance->save();
                return true;
            }
            else{
                return false;
            }
        }
        elseif($type == 2) {
            $balance = Balance::where('owner', $id)->where('money', $money)->first();
            if($balance->current_balance >= $amount) {
                $balance->last_balance = $balance->current_balance;
                $balance->current_balance = $balance->current_balance - $amount;
                $balance->save();
                return true;
            }
            else{
                return false;
            }
        }
    }

    /**
     * @param $buyer
     * @param $seller
     * @param $money
     * @param $amount
     * @param $sell_value
     */
    public function updateBalance($buyer,$seller,$money,$amount,$sell_value)
    {
        $buyerBalance = Balance::where('owner', $buyer)->where('money', $money)->first();
        $sellerBalance = Balance::where('owner', $seller)->where('money', 1)->first();
        $buyerBalance->last_balance = $buyerBalance->current_balance;
        $buyerBalance->current_balance = $buyerBalance->current_balance + $amount;
        $buyerBalance->save();
        $sellerBalance->last_balance = $sellerBalance->current_balance;
        $sellerBalance->current_balance = $sellerBalance->current_balance + $amount * $sell_value;
        $sellerBalance->save();
    }

    /**
     *
     */
    public function matchTrade()
    {
        $sellList = $this->tradeRepository->getSellActiveList(3, 1);
        $buyList = $this->tradeRepository->getBuyActiveList(3, 2);
        foreach($sellList as $sell) {
            foreach($buyList as $buy) {
                if($sell->value <= $buy->value && $sell->remain != 0 && $buy->remain != 0) {
                    $amount = min($sell->remain,$buy->remain);
                    $sell->remain = $sell->remain - $amount;
                    $buy->remain = $buy->remain - $amount;
                    $updatedSell = ActiveTrade::where('trade_id', $sell->trade_id)->first();
                    $updatedSell->remain = $sell->remain;
                    $updatedSell->save();
                    $updatedBuy = ActiveTrade::where('trade_id', $buy->trade_id)->first();
                    $updatedBuy->remain = $buy->remain;
                    $updatedBuy->save();
                    $this->tradeDetailClass->createTradeDetail($updatedSell, $updatedBuy, $amount);
                    $this->updateBalance($buy->owner,$sell->owner,$buy->money,$amount,$sell->value);
                }
            }
        }
    }

    /**
     * @param Trade $trade
     */
    public function insertToActiveList($trade_id)
    {
        $trade = DB::table('trades')->where('id', $trade_id)->first();
        DB::table('active_trades')->insert([
            'trade_id' => $trade->id,
            'owner' => $trade->owner,
            'type' => $trade->type,
            'money' => $trade->money,
            'remain' => $trade->remain,
            'value' => $trade->value,
            'created_at' => $trade->created_at,
            'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s',time(),false,true),
            'description' => $trade->reference_number
        ]);
    }

    /**
     *
     */
    public function completeTrade()
    {
        $updateTrades = DB::table('active_trades')
            ->where('remain', 0)
            ->get();
        foreach($updateTrades as $updateTrade) {
            $trade = Trade::where('id', $updateTrade->trade_id)->first();
            $trade->remain = $updateTrade->remain;
            $trade->status = 2;
            $trade->save();
        }
        DB::table('active_trades')
            ->where('remain', 0)
            ->delete();
    }

    /**
     * @param $tradeId
     * @return bool
     */
    public function cancelTrade($tradeId, $owner)
    {
        $activeTrade = ActiveTrade::where('trade_id', $tradeId)->where('owner', $owner)->first();
        if($activeTrade) {
            if ($activeTrade->remain != 0) {
                if ($activeTrade->type == 2) {
                    $balance_irr = Balance::where('owner', $activeTrade->owner)->where('money', 1)->first();
                    $balance_irr->last_balance = $balance_irr->current_balance;
                    $balance_irr->current_balance = $balance_irr->current_balance + $activeTrade->remain * $activeTrade->value;
                    $balance_irr->save();
                } elseif ($activeTrade->type == 1) {
                    $balance = Balance::where('owner', $activeTrade->owner)->where('money', $activeTrade->money)->first();
                    $balance->last_balance = $balance->current_balance;
                    $balance->current_balance = $balance->current_balance + $activeTrade->remain;
                    $balance->save();
                }
                $mainTrade = Trade::where('id', $activeTrade->trade_id)->first();
                $mainTrade->remain = $activeTrade->remain;
                $mainTrade->status = 3;
                $mainTrade->description = "لغو مبادله توسط کاربر";
                $mainTrade->save();
                $activeTrade->remain = 0;
                $activeTrade->delete();
                return true;
            } else
                return false;
        }
        else
            return false;
    }

    public function limitActiveTrades($owner, $money)
    {
        $active_trades = ActiveTrade::where('owner', $owner)
            ->where('money', $money)
            ->get();
        if($active_trades->count() >= 15)
            return false;
        else
            return true;
    }

}