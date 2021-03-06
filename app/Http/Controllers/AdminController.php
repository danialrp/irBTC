<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminManageCreditRequest;
use App\Http\Requests\AdminManageDetailRequest;
use App\Http\Requests\AdminNewUserRequest;
use App\Http\Requests\AdminSearchRequest;
use App\MyClasses\AdminClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * @var AdminClass
     */
    private $adminClass;

    public function __construct(AdminClass $adminClass)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->adminClass = $adminClass;
    }

    public function getDashboard()
    {
        $dashboard = $this->adminClass->getDashboardInfo();
        return view('admin.dashboard', compact('dashboard'));
    }

    public function getUserCredit()
    {
        $users = $this->adminClass->manageUserCredit();
        return view('admin.manageUserCredit', compact('users'));
    }

    public function postUserCredit($user_id, AdminManageCreditRequest $request)
    {
        if($this->adminClass->updateUserCredit($user_id, $request) == 1)
            Session::flash('message', 'موجودی کاربر با موفقیت بروزرسانی گردید!');
        elseif($this->adminClass->updateUserCredit($user_id, $request) == 0)
            Session::flash('message', 'هیچ موجودی بروزرسانی نگردید!');
        else
            Session::flash('message', 'متاسفانه بروزرسانی اعتبار انجام نشد!');

        return redirect('/iadmin/user/credit');
    }

    public function getSearchUserCredit(AdminSearchRequest $request)
    {
        $users = $this->adminClass->searchUserCredit($request);
        return view('admin.manageUserCredit', compact('users'));
    }

    public function getUserProfile()
    {
        $users = $this->adminClass->manageUserProfile();
        return view('admin.manageUserProfile', compact('users'));
    }

    public function getUserDetail($user_id)
    {
        $user = $this->adminClass->userDetail($user_id);
        return view('admin.manageUserDetail', compact('user'));
    }

    public function postUserDetail($user_id, AdminManageDetailRequest $request)
    {
        if($this->adminClass->updateUserDetail($user_id, $request) == 1)
            Session::flash('message', 'مشخصات کاربر با موفقیت بروزرسانی گردید!');
        else
            Session::flash('message', 'متاسفانه مشخصات کاربر بروزرسانی نگردید!');

        return redirect('/iadmin/user/profile/' . $user_id);
    }

    public function getSearchUserProfile(AdminSearchRequest $request)
    {
        $users = $this->adminClass->searchUserProfile($request);
        return view('admin.manageUserProfile', compact('users'));
    }

    public function getUserNew()
    {
        return view('admin.manageUserNew');
    }

    public function postUserNew(AdminNewUserRequest $request)
    {
        if($this->adminClass->createNewUser($request))
            Session::flash('message', 'کاربر '.$request->nname.' با موفقیت ثبت گردید!');
        else
            Session::flash('message', 'متاسفانه عملیات ثبت انجام نگردید!');

        return redirect('/iadmin/user/new');
    }

    public function getTradeActive()
    {
        $activeTrades = $this->adminClass->manageActiveTrade();
        $activeTradesSum = $this->adminClass->manageActiveTradeTotal();
        return view('admin.manageTradeActive', compact('activeTrades', 'activeTradesSum'));
    }

    public function getSearchTradeActive(AdminSearchRequest $request)
    {
        $activeTrades = $this->adminClass->searchActiveTrade($request);
        $activeTradesSum = $activeTrades->sum('remain');
        return view('admin.manageTradeActive', compact('activeTrades', 'activeTradesSum'));
    }

    public function getTradeAll()
    {
        $trades = $this->adminClass->manageTrade();
        $totalTrades = $this->adminClass->manageTradeTotal();
        return view('admin.manageTradeAll', compact('trades', 'totalTrades'));
    }

    public function getSearchTradeAll(AdminSearchRequest $request)
    {
        $trades = $this->adminClass->searchTrade($request);
        $totalTrades = $this->adminClass->searchTradeTotal($trades);
        return view('admin.manageTradeAll', compact('trades', 'totalTrades'));
    }

    public function getTradeDetail($trade_id)
    {
        $tradeDetails = $this->adminClass->manageTradeDetail($trade_id);
        return view('admin.manageTradeDetail', compact('tradeDetails'));
    }

    public function getTransactionActive()
    {
        $activeTransactions = $this->adminClass->manageActiveTransaction();
        return view('admin.manageTransactionActive', compact('activeTransactions'));
    }

    public function getTransactionConfirm($transaction_id, Request $request)
    {
        if($this->adminClass->confirmTransaction($transaction_id, $request) == 1)
            Session::flash('message', 'وضعیت تراکنش '.Crypt::decrypt($request->reference_number).' با موفقیت بروزرسانی گردید!');
        elseif($this->adminClass->confirmTransaction($transaction_id, $request) == 0)
            Session::flash('message', 'هیچ تراکنشی بروزرسانی نگردید!');
        else
            Session::flash('message', 'متاسفانه عملیات بروزرسانی انجام نگردید!');

        return redirect('/iadmin/transaction/active');
    }

    public function getTransactionAll()
    {
        $transactions = $this->adminClass->manageTransaction();
        return view('admin.manageTransactionAll', compact('transactions'));
    }

    public function getSearchTransactionAll(AdminSearchRequest $request)
    {
        $transactions = $this->adminClass->searchTransaction($request);
        return view('admin.manageTransactionAll', compact('transactions'));
    }

    public function getTransactionDetail($transaction_id)
    {
        $transaction = $this->adminClass->manageTransactionDetail($transaction_id);
        return view('admin.manageTransactionDetail', compact('transaction'));
    }

    public function postTransactionDetail(Request $request, $transaction_id)
    {
        if($this->adminClass->updateTransactionDetail($request, $transaction_id) == 1)
            Session::flash('message', 'مشخصات تراکنش با موفقیت بروزرسانی گردید!');
        elseif($this->adminClass->updateTransactionDetail($request, $transaction_id) == 0)
            Session::flash('message', 'متاسفانه بروزرسانی تراکنش انجام نگردید!');

        return redirect('/iadmin/transaction/' . $transaction_id);
    }

    public function getBankIrr()
    {
        $banks = $this->adminClass->manageBankAll();
        return view('admin.manageBankIrr', compact('banks'));
    }

    public function getSearchBankIrr(AdminSearchRequest $request)
    {
        $banks = $this->adminClass->searchBankAll($request);
        return view('admin.manageBankIrr', compact('banks'));
    }

    public function getBankBtc()
    {
        $btc_addresses = $this->adminClass->manageBtcAddressAll();
        return view('admin.manageBankBtc', compact('btc_addresses'));
    }

    public function getSearchBankBtc(AdminSearchRequest $request)
    {
        $btc_addresses = $this->adminClass->searchBtcAddress($request);
        return view('admin.manageBankBtc', compact('btc_addresses'));
    }

    public function getFeeAll()
    {
        $fees = $this->adminClass->manageFeeAll();
        return view('admin.manageFeeAll', compact('fees'));
    }

    public function getFeeDetail($fee_id)
    {
        $fee = $this->adminClass->feeDetail($fee_id);
        return view('admin.manageFeeDetail', compact('fee'));
    }

    public function postFeeDetail(Request $request, $fee_id)
    {
        if($this->adminClass->updateFeeDetail($request, Crypt::decrypt($fee_id)))
            Session::flash('message', 'مقدار کارمزد با موفقیت بروزرسانی گردید!');
        else
            Session::flash('message', 'متاسفانه مقدار کارمزد بروزرسانی نگردید!');

        return redirect('iadmin/fee/' . Crypt::decrypt($fee_id));
    }

    public function getRateAll()
    {
        $currencies = $this->adminClass->manageCurrencyAll();
        return view('admin.manageRateAll', compact('currencies'));
    }

    public function postRate(Request $request)
    {
        if($this->adminClass->updateCurrencyRate($request))
            Session::flash('message', 'ضریب جدید با موفقیت بروزرسانی گردید!');
        else
            Session::flash('message', 'متاسفانه ضریب جدید بروزرسانی نگردید!');

        return redirect('iadmin/rate');
    }
}
