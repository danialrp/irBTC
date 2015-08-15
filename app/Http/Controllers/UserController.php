<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveTradeHistoryRequest;
use App\Http\Requests\AddBtcAddressRequest;
use App\Http\Requests\AddIrrBankRequest;
use App\Http\Requests\DepositBitcoinRequest;
use App\Http\Requests\DepositRialRequest;
use App\Http\Requests\FundHistoryRequest;
use App\Http\Requests\TradeHistoryRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\WithdrawBitcoinRequest;
use App\Http\Requests\WithdrawRialRequest;
use App\MyClasses\UserClass;
use App\Repositories\TradeRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * @var UserClass
     */
    private $userClass;
    /**
     * @var TradeRepository
     */
    private $tradeRepository;

    /**
     * @param UserClass $userClass
     */
    public function __construct(UserClass $userClass, TradeRepository $tradeRepository)
    {
        $this->middleware('auth');
        /*Session::forget('message');*/
        $this->userClass = $userClass;
        $this->tradeRepository = $tradeRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function Info()
    {
        return view('user.profile.info');
    }

    /**
     * @param UpdateInfoRequest $request
     * @return \Redirector
     */
    public function UpdateInfo(UpdateInfoRequest $request)
    {
        if ($this->userClass->updateUserInfo(Auth::user()->id, $request))
            Session::flash('message', 'مشخصات شما با موفقیت ثبت شد!');
        else
            Session::flash('message', 'متاسفانه مشخصات شما ثبت نگردید!');

        return redirect('/profile');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function ChangePassword()
    {
        return view('user.profile.password', compact(Session::flash('message', '')));
    }

    /**
     * @param UpdatePasswordRequest $request
     * @return \Redirector
     */
    public function UpdatePassword(UpdatePasswordRequest $request)
    {
        $user = User::findorfail(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('message', 'تغییر کلمه عبور با موفقیت انجام شد!');
        } else {
            Session::flash('message', 'کلمه عبور فعلی صحیح نمی باشد!');
        }

        return redirect('/password');
    }

    public function fund()
    {
        $balances = $this->userClass->getBalance(Auth::user()->id);
        return view('user.fund.fund', compact([
            'ir_balance' => $balances[0]->current_balance,
            'bitcoin_balance' => $balances[2]->current_balance,
            'webmoney_balance' => $balances[3]->current_balance,
            'perfectmoney_balance' => $balances[4]->current_balance,
        ]));
    }

    public function fundHistoryShow()
    {
        $fund_reports = $this->userClass->fundReport(Auth::user()->id, 1, [4,5], [2,3,4]);
        return view('user.fund.history', compact('fund_reports'));
    }

    public function fundHistory(FundHistoryRequest $request)
    {
        $money = $request->currency_report;
        $type = array($request->kind_report);
        $status = array($request->status_report);
        $fund_reports = $this->userClass->fundReport(Auth::user()->id, $money, $type, $status);
        return view('user.fund.history', compact('fund_reports'));
    }

    public function depositBitcoinShow()
    {
        $btc_addresses = $this->userClass->getUserBitcoinAddress(Auth::user()->id);
        return view('user.fund.bitcoinDeposit', compact('btc_addresses'));
    }

    public function depositBitcoin(DepositBitcoinRequest $request)
    {
        if($request->btc_deposit_amount < 0.001)
            Session::flash('message', 'حداقل مبلغ افزایش موجودی بیتکوین 0.001 بیتکوین می باشد!');
        elseif($this->userClass->depositBitcoin(Auth::user()->id, $request->ip(), $request))
            Session::flash('message', 'درخواست شما با موفقیت ثبت گردید و هم اکنون در حال بررسی می باشد!');
        else
            Session::flash('message', 'متاسفانه درخواست شما ثبت نگردید!');
        return redirect('/fund/deposit/btc');
    }

    public function withdrawBitcoinShow()
    {
        $btc_addresses = $this->userClass->getUserBitcoinAddress(Auth::user()->id);
        return view('user.fund.bitcoinWithdraw', compact('btc_addresses'));
    }

    public function withdrawBitcoin(WithdrawBitcoinRequest $request)
    {
        $withdraw_result = $this->userClass->withdrawBitcoin(Auth::user()->id, $request->ip(), $request);

        if($withdraw_result == 1)
            Session::flash('message', 'درخواست شما با موفقیت ثبت گردید و هم اکنون در حال بررسی می باشد!');
        elseif($withdraw_result == -1)
            Session::flash('message', 'مبلغ درخواستی معتبر نمی باشد!');
        elseif($withdraw_result == -2)
            Session::flash('message','حداقل مبلغ برداشت موجودی بیتکوین 0.003 بیتکوین می باشد!');
        else
            Session::flash('message', 'متاسفانه درخواست شما ثبت نگردید!');

        return redirect('/fund/withdraw/btc');
    }

    public function depositRialShow()
    {
        $banks = $this->userClass->getUserBankAccounts(Auth::user()->id);
        return view('user.fund.rialDeposit', compact('banks'));
    }

    public function depositRial(DepositRialRequest $request)
    {
        if($request->irr_deposit_amount < 10000)
            Session::flash('message', 'حداقل مبلغ افزایش موجودی ریالی 10,000 تومان می باشد!');
        elseif($this->userClass->depositRial(Auth::user()->id, $request->ip(), $request))
            Session::flash('message', 'درخواست شما با موفقیت ثبت گردید و هم اکنون در حال بررسی می باشد!');
        else
            Session::flash('message', 'متاسفانه درخواست شما ثبت نگردید!');

        return redirect('/fund/deposit/irr');
    }

    public function withdrawRialShow()
    {
        $banks = $this->userClass->getUserBankAccounts(Auth::user()->id);
        return view('user.fund.rialWithdraw', compact('banks'));
    }

    public function withdrawRial(WithdrawRialRequest $request)
    {
        $withdraw_result = $this->userClass->withdrawRial(Auth::user()->id, $request->ip(), $request);

        if($withdraw_result == 1)
            Session::flash('message', 'درخواست شما با موفقیت ثبت گردید و هم اکنون در حال بررسی می باشد!');
        elseif($withdraw_result == -1)
            Session::flash('message', 'مبلغ درخواستی معتبر نمی باشد!');
        elseif($withdraw_result == -2)
            Session::flash('message', 'حداقل مبلغ برداشت ریالی 5000 تومان می باشد!');
        else
            Session::flash('message', 'متاسفانه درخواست شما ثبت نگردید!');

        return redirect('/fund/withdraw/irr');
    }

    public function activeTradesShow()
    {
        $active_trades = $this->tradeRepository->getUserActiveTradeReport(Auth::user()->id, [3], [1,2]);
        return view('user.trades.active', compact('active_trades'));
    }

    public function activeTrades(ActiveTradeHistoryRequest $request)
    {
        $money = array($request->currency_report);
        $type = array($request->kind_report);
        $active_trades = $this->tradeRepository->getUserActiveTradeReport(Auth::user()->id, $money, $type);
        return view('user.trades.active', compact('active_trades'));
    }

    public function tradeHistoryShow()
    {
        $trades = $this->tradeRepository->getUserAllTrades(Auth::user()->id, 3, [2,3], [1,2]);
        return view('user.trades.history', compact('trades'));
    }

    public function tradeHistory(TradeHistoryRequest $request)
    {
        $money = $request->currency_report;
        $status = array($request->status_report);
        $type = array($request->kind_report);
        $trades = $this->tradeRepository->getUserAllTrades(Auth::user()->id, $money, $status, $type);
        return view('user.trades.history', compact('trades'));
    }

    public function bankIrr()
    {
        $banks = $this->userClass->getUserBankAccounts(Auth::user()->id);
        return view('user.bank.irr', compact('banks'));
    }

    public function addBankIrr(AddIrrBankRequest $request)
    {
        if($this->userClass->addIrrBankAccount(Auth::user()->id, $request))
            Session::flash('message', 'حساب بانکی جدید با موفقیت ثبت گردید!');
        else
            Session::flash('message', 'حداکثر تعداد ۱۰ حساب فعال می توانید ذخیره نمایید!');

        return redirect('/bank/irr');
    }

    public function deleteBankIrr($bank_id)
    {
        if($this->userClass->deleteIrrBankAccount(Auth::user()->id, $bank_id))
            return redirect('/bank/irr');
    }

    public function addressBtc()
    {
        $addresses = $this->userClass->getUserBitcoinAddress(Auth::user()->id);
        return view('user.bank.btc', compact('addresses'));
    }

    public function addAddressBtc(AddBtcAddressRequest $request)
    {
        if($this->userClass->addBitcoinAddress(Auth::user()->id, $request))
            Session::flash('message', 'آدرس کیف پول جدید با موفقیت ثبت گردید!');
        else
            Session::flash('message', 'حداکثر تعداد ۵ آدرس کیف پول می توانید ذخیره کنید!');

        return redirect('/bank/btc');
    }

    public function deleteAddressBtc($address_id)
    {
        if($this->userClass->deleteBitcoinAddress(Auth::user()->id, $address_id))
            return redirect('/bank/btc');
    }

    /**
     * @param Request $request
     * @return \Response
     */
    public function updateBalance(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $balance = $this->userClass->getBalance($id);
            return response()->json($balance, 200);
        }
        else
            return response(false, 422);
    }

}
