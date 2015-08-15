<?php

namespace App\Providers;

use App\Balance;
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
}
