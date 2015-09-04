<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 8/31/15 AD
 * Time: 3:17 AM
 */

namespace App\MyClasses;

use App\Balance;
use App\Fee;
use App\Http\Requests;
use App\Http\Requests\AdminManageCreditRequest;
use App\Http\Requests\AdminSearchRequest;
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
        return User::select('id','national_number', 'fname', 'lname', 'nname')->orderby('created_at', 'desc')->paginate(20);
    }

    public function updateUserCredit($user_id, AdminManageCreditRequest $request)
    {
        if($request->irr_deposit_amount == 0 && $request->btc_deposit_amount == 0 && $request->wm_deposit_amount == 0 && $request->pm_deposit_amount == 0)
            return 0;
        if($request->irr_deposit_amount != 0) {
            $irrBalance = Balance::where('owner', $user_id)->where('money', 1)->first();
            $irrBalance->last_balance = $irrBalance->current_balance;
            $irrBalance->current_balance += $request->irr_deposit_amount;
            $irrBalance->save();
        }
        if($request->btc_deposit_amount != 0) {
            $btcBalance = Balance::where('owner', $user_id)->where('money', 3)->first();
            $btcBalance->last_balance = $btcBalance->current_balance;
            $btcBalance->current_balance += $request->btc_deposit_amount;
            $btcBalance->save();
        }
        if($request->wm_deposit_amount != 0) {
            $wmBalance = Balance::where('owner', $user_id)->where('money', 4)->first();
            $wmBalance->last_balance = $wmBalance->current_balance;
            $wmBalance->current_balance += $request->wm_deposit_amount;
            $wmBalance->save();
        }
        if($request->pm_deposit_amount != 0) {
            $pmBalance = Balance::where('owner', $user_id)->where('money', 5)->first();
            $pmBalance->last_balance = $pmBalance->current_balance;
            $pmBalance->current_balance += $request->pm_deposit_amount;
            $pmBalance->save();
        }
        return 1;
    }

    public function searchUserCredit(AdminSearchRequest $request)
    {
        return User::where(function($query) use($request){
            if($request->national_number)
                $query->where('national_number', '=', $request->national_number);
            if($request->fname)
                $query->where('fname', 'like', $request->fname.'%');
            if($request->lname)
                $query->where('lname', 'like', $request->lname.'%');
            if($request->nname)
                $query->where('nname', 'like', $request->nname.'%');
        })
            ->select('id','national_number', 'fname', 'lname', 'nname')
            ->orderby('created_at', 'desc')
            ->paginate(20);
    }

}