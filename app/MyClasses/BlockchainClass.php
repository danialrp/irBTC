<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 9/15/15 AD
 * Time: 3:26 PM
 */

namespace App\MyClasses;


use App\BlockchainRate;
use App\Money;
use App\Providers\JDateServiceProvider;
use Blockchain\Blockchain;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlockchainClass {

    private $api_code = '9d25d3ef-eedd-4401-aa48-98c3f3bd54de';

    public function __construct()
    {

    }

    public function insertLatestRate()
    {
        $blockchain = new Blockchain($this->api_code);
        $rate = $blockchain->Rates->get();
        $lastRate = $rate['USD'];
        $previous = $this->getLatestRate();
        $usdRate = Money::where('id', 1)->select('rate')->first();

        if( ! $lastRate)
            dd($lastRate);

        DB::table('blockchain_rates')
            ->insert([
                'previous' => $previous->last,
                'last' => $lastRate->last * $usdRate->rate,
                'buy' => $lastRate->buy * $usdRate->rate,
                'sell' => $lastRate->sell * $usdRate->rate,
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
                'created_at' => Carbon::now()
            ]);
    }

    public function getLatestRate()
    {
        return BlockchainRate::orderby('created_at', 'desc')
            ->select('previous', 'last', 'created_fa')
            ->first();
    }
}