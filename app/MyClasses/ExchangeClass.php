<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 10/3/15 AD
 * Time: 1:59 PM
 */

namespace App\MyClasses;


use App\Http\Requests\ExchangeSellRequest;

class ExchangeClass {

    private $exchangeFeeId = 6;
    private $btcMoneyId = 3;
    private $compeleteStatusId = 2;
    private $cancelStatusId = 3;
    private $processingStatusId = 4;
    private $waintingStatusId = 5;


    public function generateReferenceNumber($rf_number)
    {
        $trade = Trade::where('reference_number', $rf_number)->first();
        while($trade) {
            $rf_number = rand(00000000,99999999);
            $trade = Trade::where('reference_number', $rf_number)->first();
        }
        return $rf_number;
    }

    public function exchangeSell(ExchangeSellRequest $request, $userId)
    {

    }

}