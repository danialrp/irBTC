<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 8/31/15 AD
 * Time: 3:17 AM
 */

namespace App\MyClasses;

use App\ActiveTrade;
use App\Balance;
use App\Fee;
use App\Http\Requests;
use App\Http\Requests\AdminManageCreditRequest;
use App\Http\Requests\AdminManageDetailRequest;
use App\Http\Requests\AdminNewUserRequest;
use App\Http\Requests\AdminSearchRequest;
use App\Providers\JDateServiceProvider;
use App\Trade;
use App\TradeDetail;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminClass {

    private $paginateValue = 20;
    /**
     * @var UserClass
     */
    private $userClass;

    public function __construct(UserClass $userClass)
    {
        $this->userClass = $userClass;
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
        return User::where('role', 2)
            ->select('id','national_number', 'fname', 'lname', 'nname')
            ->orderby('created_at', 'desc')
            ->paginate($this->paginateValue);
    }

    public function updateUserCredit($user_id, AdminManageCreditRequest $request)
    {
        if($request->irr_deposit_amount == 0 &&
            $request->btc_deposit_amount == 0 &&
            $request->wm_deposit_amount == 0 &&
            $request->pm_deposit_amount == 0 )
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
            ->paginate($this->paginateValue);
    }

    public function manageUserProfile()
    {
        return User::select('id', 'fname', 'lname', 'nname', 'email', 'national_number', 'active', 'confirmed', 'role', 'login_time', 'ip_address')
            ->orderby('created_at', 'desc')
            ->paginate($this->paginateValue);
    }

    public function userDetail($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    public function updateUserDetail($user_id, AdminManageDetailRequest $request)
    {
        $user = User::where('id', $user_id)->first();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->nname = $request->nname;
        if($request->password != '')
            $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->national_number = $request->national_number;
        $user->active = $request->active;
        $user->confirmed = $request->confirmed;
        $user->save();
        return 1;
    }

    public function searchUserProfile(AdminSearchRequest $request)
    {
        return User::where(function($query) use($request){
            if($request->role != '')
                $query->where('role', $request->role);
            if($request->nname)
                $query->where('nname', 'like', $request->nname.'%');
            if($request->email)
                $query->where('email', 'like', $request->email.'%');
            if($request->national_number)
                $query->where('national_number', '=', $request->national_number);
            if($request->fname)
                $query->where('fname', 'like', $request->fname.'%');
            if($request->lname)
                $query->where('lname', 'like', $request->lname.'%');
            if($request->active != '')
                $query->where('active', $request->active);
            if($request->confirmed != '')
                $query->where('confirmed', $request->confirmed);
            if($request->ip_address)
                $query->where('ip_address', 'like', $request->ip_address.'%');
        })
            ->select('id', 'fname', 'lname', 'nname', 'email', 'national_number', 'active', 'confirmed', 'role', 'login_time', 'ip_address')
            ->orderby('created_at', 'desc')
            ->paginate($this->paginateValue);
    }

    public function createNewUser(AdminNewUserRequest $request)
    {
        $request->fname ? $fname = $request->fname : $fname = null;
        $request->lname ? $lname = $request->lname : $lname = null;
        $request->tel ? $tel = $request->tel : $tel = null;
        $request->mobile ? $mobile = $request->mobile : $mobile = null;
        $request->address ? $address = $request->address : $address = null;
        $request->national_number ? $national_number = $request->national_number : $national_number = null;
        $newUserId =
            DB::table('users')->insertGetId([
                'fname' => $fname,
                'lname' => $lname,
                'nname' => $request->nname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tel' => $tel,
                'mobile' => $mobile,
                'address' => $address,
                'national_number' => $national_number,
                'active' => $request->active,
                'confirmed' => $request->confirmed,
                'role' => $request->role,
                'created_at' => Carbon::now(),
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true)
            ]);
        $this->userClass->makeBalance($newUserId);
        return true;
    }

    public function manageActiveTrade()
    {
        return $activeTrades = ActiveTrade::orderby('remain', 'desc')
            ->paginate($this->paginateValue);
    }

    public function manageActiveTradeTotal()
    {
        $activeTrades = ActiveTrade::select('remain')->get();
        return $activeTrades->sum('remain');
    }

    public function searchActiveTrade(AdminSearchRequest $request)
    {
        return ActiveTrade::where(function($query) use($request){
            if($request->kind_report != 0)
                $query->where('type', $request->kind_report);
            if($request->currency_report != 0)
                $query->where('money', $request->currency_report);
            if($request->reference_number)
                $query->where('description', 'like', $request->reference_number.'%');
        })
            ->orderby('remain', 'desc')
            ->paginate($this->paginateValue);
    }

    public function manageTrade()
    {
        return $trades = Trade::orderby('created_fa', 'desc')
            ->paginate($this->paginateValue);
    }

    public function manageTradeTotal()
    {
        $trades = Trade::select('amount', 'remain', 'value', 'fee_amount')->get();
        $totalIrr = 0;
        foreach($trades as $trade) {
            $temp = $trade->amount * $trade->value;
            $totalIrr += $temp;
        }
        return $tradesTotal = [
            'totalBtcAmount' => $trades->sum('amount'),
            'totalIrrAmount' => $totalIrr,
            'totalRemain' => $trades->sum('remain'),
            'totalFeeAmount' => $trades->sum('fee_amount')
        ];
    }

    public function searchTrade(AdminSearchRequest $request)
    {
        return Trade::where(function($query) use($request) {
            if($request->kind_report != 0)
                $query->where('type', $request->kind_report);
            if($request->reference_number)
                $query->where('reference_number', $request->reference_number);
            if($request->nname) {
                $user = User::where('nname', 'like', $request->nname.'%')->first();
                if($user)
                    $query->where('owner', $user->id);
            }
            if($request->currency_report != 0)
                $query->where('money', $request->currency_report);
            if($request->status_report != 0)
                $query->where('status', $request->status_report);
        })
            ->orderby('created_fa', 'desc')
            ->paginate($this->paginateValue);
    }

    public function searchTradeTotal($trades)
    {
        $totalIrr = 0;
        foreach($trades as $trade) {
            $temp = $trade->amount * $trade->value;
            $totalIrr += $temp;
        }
        return $tradesTotal = [
            'totalBtcAmount' => $trades->sum('amount'),
            'totalIrrAmount' => $totalIrr,
            'totalRemain' => $trades->sum('remain'),
            'totalFeeAmount' => $trades->sum('fee_amount')
        ];
    }

    public function manageTradeDetail($trade_id)
    {
        return TradeDetail::where('trade1', $trade_id)
            ->orWhere('trade2', $trade_id)
            ->orderby('created_at', 'desc')
            ->get();

    }

    public function manageActiveTransaction()
    {
        return Transaction::where('status', 4)
            ->orderby('created_fa')
            ->paginate($this->paginateValue);
    }

    public function confirmTransaction($transaction_id, Request $request)
    {
        $transaction = Transaction::where('id', $transaction_id)->first();
        if($transaction->status == $request->status_report)
            return 0;
        else {
            $transaction->status = $request->status_report;
            $request->note ? $transaction->note = $request->note : $transaction->note = null;
            $transaction->save();
            if ($transaction->type == 4 && $request->status_report == 2) {
                $balance = Balance::where('owner', $transaction->owner)
                    ->where('money', $transaction->money)
                    ->first();
                $balance->last_balance = $balance->current_balance;
                $balance->current_balance += $transaction->amount;
                $balance->save();
            }
            return 1;
        }
    }

}