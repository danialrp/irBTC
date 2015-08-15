<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';

    public function userBank()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function transactionBank()
    {
        return $this->hasMany('App\Transaction', 'bank');
    }

    public function moneyBank()
    {
        return $this->hasOne('App\Money', 'money');
    }
}
