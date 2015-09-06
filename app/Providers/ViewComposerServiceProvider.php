<?php

namespace App\Providers;

use App\Balance;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getUserBalance();
        $this->getUserFootage();
        $this->getAdminHeaderInfo();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getUserBalance()
    {
        view()->composer(['partial.sidebar', 'partial.fundMenu'], function ($view) {
            if(Auth::check())
            {
                $balances = Balance::where('owner', Auth::user()->id)->select('current_balance')->get();
                $view->with
                ([
                    'ir_balance' => $balances[0]->current_balance,
                    'usd_balance' => $balances[1]->current_balance,
                    'bitcoin_balance' => $balances[2]->current_balance,
                    'webmoney_balance' => $balances[3]->current_balance,
                    'perfectmoney_balance' => $balances[4]->current_balance
                ]);
            }
            else
            {
                $view;
            }

        });
    }

    public function getUserFootage()
    {
        view()->composer('partial.sidebar', function ($view) {
            if(Auth::check())
            {
                $user = User::where('id', Auth::user()->id)->select('created_fa', 'login_time', 'ip_address')->first();
                $view->with
                ([
                    'created_fa' => $user->created_fa,
                    'login_time' => $user->login_time,
                    'ip_address' => $user->ip_address
                ]);
            }
            else
            {
                $view;
            }

        });
    }

    public function getAdminHeaderInfo()
    {
        view()->composer('admin.partial.header', function($view) {
           if(Auth::check())
           {
               $waitingPayment = Transaction::where('status', 4)->count();
               $balances = Balance::select('current_balance', 'money')->get();
               $view->with([
                   'countWaitingPayment' => $waitingPayment,
                   'irrTotalBalance' => $balances->where('money', 1)->sum('current_balance'),
                   'btcTotalBalance' => $balances->where('money', 3)->sum('current_balance'),
                   'wmTotalBalance' => $balances->where('money', 4)->sum('current_balance'),
                   'pmTotalBalance' => $balances->where('money', 5)->sum('current_balance'),
                   'currentTime' => JDateServiceProvider::date('Y/m/d@H:i', time(), false, true),
               ]);
           }
            else
            {
                $view;
            }
        });
    }
}
