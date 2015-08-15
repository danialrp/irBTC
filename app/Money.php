<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $table = 'monies';

    public function balanceMoney()
    {
        return $this->hasMany('App\Balance', 'money');
    }

    public function tradeMoney()
    {
        return $this->hasMany('App\Trade', 'money');
    }

    public function bankMoney()
    {
        return $this->belongsToMany('App\Bank', 'money');
    }

    public function transactionMoney()
    {
        return $this->hasMany('App\Transaction', 'money');
    }
}
