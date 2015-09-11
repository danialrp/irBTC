<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 7/19/15 AD
 * Time: 10:36 PM
 */

namespace App\MyClasses;


use App\ActiveTrade;
use App\Balance;
use App\Bank;
use App\Fee;
use App\Http\Requests\AddBtcAddressRequest;
use App\Http\Requests\AddIrrBankRequest;
use App\Http\Requests\DepositBitcoinRequest;
use App\Http\Requests\DepositRialRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Requests\WithdrawBitcoinRequest;
use App\Http\Requests\WithdrawRialRequest;
use App\Providers\JDateServiceProvider;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserClass
{

    public function generateReferenceNumber($rf_number)
    {
        $transaction = Transaction::where('reference_number', $rf_number)->first();
        while($transaction) {
            $rf_number = rand(00000000,99999999);
            $transaction = Transaction::where('reference_number', $rf_number)->first();
        }
        return $rf_number;
    }

    public function updateUserInfo($id, UpdateInfoRequest $request)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($user->confirmed == 0) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'tel' => $request->tel,
                    'mobile' => $request->mobile,
                    'national_number' => $request->national_number,
                    'address' => $request->address,
                    'confirmed' => 1
                ]);
            return true;
        } else
            return false;
    }

    public function makeBalance($id)
    {
        DB::table('balances')->insert(['owner' => $id, 'money' => 1, 'current_balance' => 0, 'last_balance' => 0, 'created_at' => Carbon::now()]);
        DB::table('balances')->insert(['owner' => $id, 'money' => 2, 'current_balance' => 0, 'last_balance' => 0, 'created_at' => Carbon::now()]);
        DB::table('balances')->insert(['owner' => $id, 'money' => 3, 'current_balance' => 0, 'last_balance' => 0, 'created_at' => Carbon::now()]);
        DB::table('balances')->insert(['owner' => $id, 'money' => 4, 'current_balance' => 0, 'last_balance' => 0, 'created_at' => Carbon::now()]);
        DB::table('balances')->insert(['owner' => $id, 'money' => 5, 'current_balance' => 0, 'last_balance' => 0, 'created_at' => Carbon::now()]);
    }

    public function getBalance($id)
    {
        return Balance::where('owner', $id)
            ->select('current_balance')
            ->get();
    }

    public function setLoginFootage($id, $ip)
    {
        $user = User::where('id', $id)->first();
        $user->login_time = JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true);
        $user->ip_address = $ip;
        $user->save();
    }

    public function addIrrBankAccount($id, AddIrrBankRequest $request)
    {
        $banks = DB::table('banks')
            ->where('owner', $id)
            ->where('money', 1)
            ->where('deleted', 0)
            ->count();
        if ($banks >= 10)
            return false;
        else {
            DB::table('banks')->insert([
                'owner' => $id,
                'money' => 1,
                'name' => $request->bank_name,
                'acc_number' => $request->acc_number,
                'card_number' => $request->card_number,
                'shaba_number' => $request->shaba_number,
                'description' => 'حساب بانک',
                'created_at' => Carbon::now(),
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
            ]);
            return true;
        }
    }

    public function deleteIrrBankAccount($user_id, $bank_id)
    {
        DB::table('banks')
            ->where('owner', $user_id)
            ->where('id', $bank_id)
            ->update([
                'deleted' => 1
            ]);
        return true;
    }

    public function getUserBankAccounts($id)
    {
        $banks = DB::table('banks')
            ->where('owner', $id)
            ->where('money', 1)
            ->where('deleted', 0)
            ->orderby('created_fa', 'desc')
            ->get();
        return $banks;
    }

    public function addBitcoinAddress($id, AddBtcAddressRequest $request)
    {
        $addresses = DB::table('banks')
            ->where('owner', $id)
            ->where('money', 3)
            ->where('deleted', 0)
            ->count();
        if ($addresses >= 5)
            return false;
        else {
            DB::table('banks')->insert([
                'owner' => $id,
                'money' => 3,
                'name' => 'آدرس بیتکوین',
                'acc_number' => $request->btc_address,
                'description' => 'حساب بیتکوین',
                'created_at' => Carbon::now(),
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
            ]);
            return true;
        }
    }

    public function deleteBitcoinAddress($user_id, $btcAddress_id)
    {
        DB::table('banks')
            ->where('owner', $user_id)
            ->where('id', $btcAddress_id)
            ->update([
                'deleted' => 1
            ]);
        return true;
    }

    public function getUserBitcoinAddress($id)
    {
        $addresses = Bank::where('owner', $id)->where('money', 3)->where('deleted', 0)->orderby('created_fa', 'desc')->get();
        return $addresses;
    }

    public function depositRial($id, $ip, DepositRialRequest $request)
    {
        DB::table('transactions')->insert([
            'reference_number' => $this->generateReferenceNumber(rand(00000000,99999999)),
            'owner' => $id,
            'type' => 4,
            'bank' => $request->bank_name,
            'to' => $request->our_banks,
            'money' => 1,
            'amount' => $request->irr_deposit_amount,
            'fee_amount' => 0,
            'tracking_number' => $request->tracking_number,
            'status' => 4,
            'description' => $ip,
            'created_at' => Carbon::now(),
            'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true)
        ]);
        return true;
    }

    public function withdrawRial($id, $ip, WithdrawRialRequest $request)
    {
        if($request->irr_withdraw_amount < 5000)
            return -2;
        $irr_balance = Balance::where('owner', $id)->where('money', 1)->first();
        if($irr_balance->current_balance < $request->irr_withdraw_amount)
            return -1;
        if($irr_balance->current_balance >= $request->irr_withdraw_amount) {
            $irr_balance->last_balance = $irr_balance->current_balance;
            $irr_balance->current_balance = $irr_balance->current_balance - $request->irr_withdraw_amount;
            $irr_balance->save();
            $fee_amount = Fee::where('id', 2)->first();
            DB::table('transactions')->insert([
                'reference_number' => $this->generateReferenceNumber(rand(00000000,99999999)),
                'owner' => $id,
                'type' => 5,
                'bank' => $request->bank_name,
                'to' => '-',
                'money' => 1,
                'amount' => $request->irr_withdraw_amount,
                'fee_amount' => $fee_amount->fee_value,
                'tracking_number' => '-',
                'status' => 4,
                'description' => $ip,
                'created_at' => Carbon::now(),
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true)
            ]);
            return 1;
        }
        else
            return 0;
    }

    public function depositBitcoin($id, $ip, DepositBitcoinRequest $request)
    {
        DB::table('transactions')->insert([
            'reference_number' => $this->generateReferenceNumber(rand(00000000,99999999)),
            'owner' => $id,
            'type' => 4,
            'bank' => $request->btc_address_select,
            'to' => $request->our_btc_address,
            'money' => 3,
            'amount' => $request->btc_deposit_amount,
            'fee_amount' => 0,
            'tracking_number' => '',
            'status' => 4,
            'description' => $ip,
            'created_at' => Carbon::now(),
            'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true)
        ]);
        return true;
    }

    public function withdrawBitcoin($id, $ip, WithdrawBitcoinRequest $request)
    {
        if($request->btc_withdraw_amount < 0.003)
            return -2;
        $btc_balance = Balance::where('owner', $id)->where('money', 3)->first();
        if($btc_balance->current_balance < $request->btc_withdraw_amount)
            return -1;
        if($btc_balance->current_balance >= $request->btc_withdraw_amount) {
            $btc_balance->last_balance = $btc_balance->current_balance;
            $btc_balance->current_balance = $btc_balance->current_balance - $request->btc_withdraw_amount;
            $btc_balance->save();
            $fee_amount = Fee::where('id', 3)->first();
            DB::table('transactions')->insert([
                'reference_number' => $this->generateReferenceNumber(rand(00000000,99999999)),
                'owner' => $id,
                'type' => 5,
                'bank' => $request->btc_address_select,
                'to' => '-',
                'money' => 3,
                'amount' => $request->btc_withdraw_amount,
                'fee_amount' => $fee_amount->fee_value,
                'tracking_number' => '-',
                'status' => 4,
                'description' => $ip,
                'created_at' => Carbon::now(),
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true)
            ]);
            return 1;
        }
        else
            return 0;
    }

    public function fundReport($id, $money, $type, $status)
    {
        if($type == [0])
            $type = [4,5];
        if($status == [0])
            $status = [2,3,4];
        return $fund_report = Transaction::where('owner', $id)
            ->where('money', $money)
            ->whereIn('type', $type)
            ->whereIn('status', $status)
            ->select('id', 'reference_number', 'type', 'created_fa', 'amount', 'money', 'bank', 'status', 'note')
            ->orderby('created_fa', 'desc')
            ->get();
    }
}