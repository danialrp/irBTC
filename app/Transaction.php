<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function userTransaction()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function bankTransaction()
    {
        return $this->belongsTo('App\Bank', 'bank');
    }

    public function statusTransaction()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function moneyTransaction()
    {
        return $this->belongsTo('App\Money', 'money');
    }

    public function typeTransaction()
    {
        return $this->belongsTo('App\Type', 'type');
    }
}
