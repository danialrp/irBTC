<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Http\Requests\BitcoinTradeRequest;
use App\MyClasses\TradeClass;
use App\Repositories\TradeRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class TradeController extends Controller
{
    /**
     * @var TradeClass
     */
    private $tradeClass;
    /**
     * @var TradeRepository
     */
    private $tradeRepository;

    /**
     * @param TradeClass $tradeClass
     */
    public function __construct(TradeClass $tradeClass, TradeRepository $tradeRepository)
    {
        $this->middleware('auth', ['except' => ['Webmoney','Bitcoin','Perfectmoney']]);
        $this->tradeClass = $tradeClass;
        $this->tradeRepository = $tradeRepository;
        /*Session::forget('message');*/
    }

    /**
     * @param TradeRepository $tradeRepository
     * @return \Illuminate\View\View
     */
    public function Bitcoin()
    {
        $sell_trades = $this->tradeRepository->showOpenTrade(1, 3);
        $buy_trades = $this->tradeRepository->showOpenTrade(2, 3);
        $total_sell = $this->tradeRepository->totalTrade(1, 3);
        $total_buy = $this->tradeRepository->totalTrade(2,3);
        $fee = Fee::findOrFail(1);
        if(Auth::check())
            $active_trades = $this->tradeRepository->getUserActiveTrade(Auth::user()->id, 3);

        return view('trade.bitcoin',compact
        ([
            'buy_trades',
            'sell_trades',
            'fee',
            'total_buy',
            'total_sell',
            'active_trades'
        ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getBitcoinTable(Request $request)
    {
        if($request->ajax()) {
            $sell_trades = $this->tradeRepository->showOpenTrade(1, 3);
            $buy_trades = $this->tradeRepository->showOpenTrade(2, 3);
            $total_sell = $this->tradeRepository->totalTrade(1, 3);
            $total_buy = $this->tradeRepository->totalTrade(2, 3);
            $fee = Fee::findOrFail(1);
            return view('partial.bitcoinTable', compact
            ([
                'buy_trades',
                'sell_trades',
                'total_buy',
                'total_sell',
                'fee'
            ]));
        }
        else
            return response(false, 422);
    }

    /**
     * @param Request $request
     * @return \Response
     */
    public function getBitcoinActiveTrades(Request $request)
    {
        if($request->ajax()) {
            if(Auth::check()) {
                $active_trades = $this->tradeRepository->getUserActiveTrade(Auth::user()->id, 3);
                return view('partial.activeTradeBtc', compact('active_trades'));
            }
        }
        else
            return response(false, 422);
    }

    /**
     * @param BitcoinTradeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sellBitcoin(BitcoinTradeRequest $request)
    {
        $amount = $request->sell_amount;
        $value = $request->sell_value;

        if($amount < 0.001)
            return response()->json(['message' => ['حداقل مقدار فروش 0.001 بیتکوین می باشد!']], 422);

        $chk_balance = $this->tradeClass->checkBalance(Auth::user()->id, 3, 1, $amount);

        if($chk_balance) {
            $this->tradeClass->createTrade(Auth::user()->id, 1, $amount, $value, 3);
            return response()->json(['message' => 'مبادله فروش با موفقیت ثبت شد!'], 200);
        }
        else
            return response()->json(['message' => ['متاسفانه موجودی کافی نیست!']], 422);
    }

    /**
     * @param BitcoinTradeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function buyBitcoin(BitcoinTradeRequest $request)
    {
        $amount = $request->sell_amount;
        $value = $request->sell_value;

        if($amount < 0.001)
            return response()->json(['message' => ['حداقل مقدار خرید 0.001 بیتکوین می باشد!']], 422);

        $chk_balance = $this->tradeClass->checkBalance(Auth::user()->id, 1, 2, $amount*$value);

        if($chk_balance) {
            $this->tradeClass->createTrade(Auth::user()->id, 2, $amount, $value, 3);
            return response()->json(['message' => 'مبادله خرید با موفقیت ثبت شد!'], 200);
        }
        else
            return response()->json(['message' => ['متاسفانه موجودی کافی نیست!']], 422);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelTrade(Request $request)
    {
        if($this->tradeClass->cancelTrade($request->trade_id, Auth::user()->id)) {
            return response()->json(['message' => 'مبادله مورد نظر با موفقیت لغو شد!'], 200);
        }
        else
            return response()->json(['message' => ['عملیات لغو انجام نشد!']], 422);
    }

    public function Webmoney()
    {
        return view('trade.webmoney');
    }

    public function Perfectmoney()
    {
        return view('trade.perfectmoney');
    }
}
