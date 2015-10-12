<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangeBuyRequest;
use App\Http\Requests\ExchangeSellRequest;
use App\MyClasses\ExchangeClass;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $sellResponse = $this->exchangeClass->exchangeSell($request, Auth::user()->id);

        if($sellResponse == -1)
            Session::flash('message', 'متاسفانه موجودی کافی نیست!');

        if($sellResponse == 0)
            Session::flash('message', 'عملیات فروش انجام نشد!');

        if($sellResponse == 1)
            Session::flash('message', 'عملیات فروش با موفقیت انجام شد!');

        return redirect('/exchange');
    }

    public function postBuy(ExchangeBuyRequest $request)
    {
        $buyResponse = $this->exchangeClass->exchangeBuy($request, Auth::user()->id);

        if($buyResponse == -1)
            Session::flash('message', 'متاسفانه موجودی کافی نیست!');

        if($buyResponse == 0)
            Session::flash('message', 'عملیات فروش انجام نشد!');

        if($buyResponse == 1)
            Session::flash('message', 'عملیات فروش با موفقیت انجام شد!');

        return redirect('/exchange');
    }
}
