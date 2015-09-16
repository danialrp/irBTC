<?php

namespace App\Http\Controllers;

use App\MyClasses\BlockchainClass;
use Blockchain\Blockchain;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlockchainController extends Controller
{
    /**
     * @var BlockchainClass
     */
    private $blockchainClass;

    public function __construct(BlockchainClass $blockchainClass)
    {
        $this->blockchainClass = $blockchainClass;
    }

    public function postBtcRate()
    {
        $latestRate = $this->blockchainClass->getLatestRate();

        if( ! $latestRate)
            return response()->json(null, 422);

        return response()->json($latestRate, 200);
    }
}
