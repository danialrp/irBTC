<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangeBuyRequest;
use App\Http\Requests\ExchangeSellRequest;
use App\MyClasses\ExchangeClass;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{

    /**
     * @var ExchangeClass
     */
    private $exchangeClass;

    public function __construct(ExchangeClass $exchangeClass)
    {
        $this->middleware('auth', ['except' => ['getExchange']]);
        $this->exchangeClass = $exchangeClass;
    }

    public function getExchange()
    {
        return view('exchng.exchange');
    }

    public function postSell(ExchangeSellRequest $request)
    {
        $this->exchangeClass->exchangeSell($request, Auth::user()->id);
        return false;
    }

    public function postBuy(ExchangeBuyRequest $request)
    {
        return false;
    }
}
