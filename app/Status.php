<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    public function tradeStatus()
    {
        return $this->hasMany('App\Trades', 'status');
    }

    public function transactionStatus()
    {
        return $this->belongsTo('App\Transaction', 'status');
    }
}
