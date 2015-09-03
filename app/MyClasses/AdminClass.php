<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 8/31/15 AD
 * Time: 3:17 AM
 */

namespace App\MyClasses;

use App\Fee;
use App\Http\Requests;
use App\Trade;
use App\TradeDetail;
use App\Transaction;
use App\User;
use Carbon\Carbon;

class AdminClass {

    public function __construct()
    {

    }

    public function getDashboardInfo()
    {
        $allUsers = User::select('id', 'confirmed')->get();
        $newUsers = User::where('created_at', '>=', Carbon::today())->select('id')->get();
        $allTransactions = Transaction::select('id', 'money', 'type', 'amount', 'status')->get();
        $newTransactions = Transaction::where('created_at', '>=', Carbon::today())->select('id', 'money')->get();
        $allBtcTrades = Trade::select('id', 'money', 'amount', 'type', 'fee_amount')->get();
        $allBtcTradeDetails = TradeDetail::where('description', '=', 'کسر کارمزد')->select('amount')->get();
        $fee = Fee::where('id', 1)->select('fee_value')->first();

        return $dashborad = [
            'users' => $allUsers->count(),
            'usersConfirmed' => $allUsers->where('confirmed', 1)->count(),
            'newUsers' => $newUsers->count(),
            'irrTotalDeposit' => $allTransactions->where('status', 2)->where('money', 1)->where('type', 4)->sum('amount'),
            'irrTotalWithdraw' => $allTransactions->where('status', 2)->where('money', 1)->where('type', 5)->sum('amount'),
            'irrTotalTurnover' => $allTransactions->where('status', 2)->where('money', 1)->sum('amount'),
            'irrTodayTransactions' => $newTransactions->where('money', 1)->count(),
            'irrAllTransactions' => $allTransactions->where('money', 1)->count(),
            'btcTotalDeposit' => $allTransactions->where('status', 2)->where('money', 3)->where('type', 4)->sum('amount'),
            'btcTotalWithdraw' => $allTransactions->where('status', 2)->where('money', 3)->where('type', 5)->sum('amount'),
            'btcTotalTurnover' => $allTransactions->where('status', 2)->where('money', 3)->sum('amount'),
            'btcTodayTransactions' => $newTransactions->where('money', 3)->count(),
            'btcAllTransactions' => $allTransactions->where('money', 3)->count(),
            'btcBuyTrades' => $allBtcTrades->where('money', 3)->where('type', 2)->count(),
            'btcTotalBuyTrades' => $allBtcTrades->where('money', 3)->where('type', 2)->sum('amount'),
            'btcSellTrades' => $allBtcTrades->where('money', 3)->where('type', 1)->count(),
            'btcTotalSellTrades' => $allBtcTrades->where('money', 3)->where('type', 1)->sum('amount'),
            'feeAmountIrr' => $allBtcTrades->sum('fee_amount'),
            'feeAmountBtc' => $allBtcTradeDetails->sum('amount'),
            'currentFee' => $fee,
        ];
    }

    public function manageUserCredit()
    {
        return User::select('id','national_number', 'fname', 'lname', 'nname')->orderby('created_at', 'desc')->paginate(25);
    }

}