<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 10/3/15 AD
 * Time: 1:59 PM
 */

namespace App\MyClasses;


use App\Balance;
use App\BlockchainRate;
use App\Exchange;
use App\Fee;
use App\Http\Requests\ExchangeBuyRequest;
use App\Http\Requests\ExchangeSellRequest;
use App\Providers\JDateServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExchangeClass {

    private $btcExchangeFeeId = 6;
    private $irrMoneyId = 1;
    private $btcMoneyId = 3;
    private $compeleteStatusId = 2;
    private $cancelStatusId = 3;
    private $processingStatusId = 4;
    private $waintingStatusId = 5;
    private $sellId = 1;
    private $buyId = 2;


    public function generateReferenceNumber($rf_number)
    {
        $exchange = Exchange::where('reference_number', $rf_number)->first();
        while($exchange) {
            $rf_number = rand(00000000,99999999);
            $exchange = Exchange::where('reference_number', $rf_number)->first();
        }
        return $rf_number;
    }

    public function checkBalance($owner, $money, $amount)
    {
        $balance = Balance::where('owner', $owner)
            ->where('money', $money)
            ->first();

        if($amount > $balance->current_balance)
            return false;

        return true;
    }

    public function updateBalance($owner, $money, $amount)
    {
        $updatedBalance = Balance::where('owner', $owner)
            ->where('money', $money)
            ->first();

        if( ! $updatedBalance)
            return false;

        $updatedBalance->last_balance = $updatedBalance->current_balance;
        $updatedBalance->current_balance = $updatedBalance->current_balance + $amount;
        $updatedBalance->updated_at = Carbon::now();
        $updatedBalance->save();

        return true;
    }

    public function insertExchange(Exchange $exchange)
    {
        DB::table('exchanges')->insert([
            'reference_number' => $exchange->reference_number,
            'owner' => $exchange->owner,
            'type' => $exchange->type,
            'amount' => $exchange->amount,
            'value' => $exchange->value,
            'status' => $exchange->status,
            'money' => $exchange->money,
            'description' => $exchange->description,
            'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s',time(),false,true),
            'created_at' => Carbon::now()
        ]);
    }

    public function getExchangeFee($feeId)
    {
        return Fee::where('id', $feeId)
            ->first();
    }

    public function getBtcRate()
    {
        return BlockchainRate::orderBy('created_at', 'desc')
            ->first();
    }

    public function exchangeSell(ExchangeSellRequest $request, $userId)
    {
        $feeAmount = $this->getExchangeFee($this->btcExchangeFeeId);
        $btcRate = $this->getBtcRate();
        $buyRate = $btcRate->buy - $feeAmount->fee_value;
        $irrSellTotal = $buyRate * $request->sell_exchange_amount;

        if( ! $this->checkBalance($userId, $this->btcMoneyId, $request->sell_exchange_amount))
            return -1;

        if( ! $this->updateBalance($userId, $this->btcMoneyId, - $request->sell_exchange_amount))
            return 0;

        if( ! $this->updateBalance($userId, $this->irrMoneyId, $irrSellTotal))
            return 0;

        $exchange = new Exchange();
        $exchange->reference_number = $this->generateReferenceNumber(rand(00000000, 99999999));
        $exchange->owner = $userId;
        $exchange->type = $this->sellId;
        $exchange->amount = $request->sell_exchange_amount;
        $exchange->value = $buyRate;
        $exchange->status = $this->processingStatusId;
        $exchange->money = $this->btcMoneyId;
        $exchange->description = 'توسط کاربر';

        $this->insertExchange($exchange);

        return 1;

    }

    public function exchangeBuy(ExchangeBuyRequest $request, $userId)
    {
        $feeAmount = $this->getExchangeFee($this->btcExchangeFeeId);
        $btcRate = $this->getBtcRate();
        $sellRate = $btcRate->sell + $feeAmount->fee_value;
        $irrBuyTotal = $sellRate * $request->buy_exchange_amount;

        if( ! $this->checkBalance($userId, $this->irrMoneyId, $irrBuyTotal))
            return -1;

        if( ! $this->updateBalance($userId, $this->btcMoneyId, $request->buy_exchange_amount))
            return 0;

        if( ! $this->updateBalance($userId, $this->irrMoneyId, - $irrBuyTotal))
            return 0;

        $exchange = new Exchange();
        $exchange->reference_number = $this->generateReferenceNumber(rand(00000000, 99999999));
        $exchange->owner = $userId;
        $exchange->type = $this->buyId;
        $exchange->amount = $request->buy_exchange_amount;
        $exchange->value = $sellRate;
        $exchange->status = $this->processingStatusId;
        $exchange->money = $this->btcMoneyId;
        $exchange->description = 'توسط کاربر';

        $this->insertExchange($exchange);

        return 1;
    }

}