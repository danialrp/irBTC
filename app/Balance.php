<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';

    public function balanceUser()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function balanceMoney()
    {
        return $this->belongsTo('App\Money', 'money');
    }
}
