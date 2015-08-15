<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $table = 'trades';

    public function ownerTrade()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function typeTrade()
    {
        return $this->belongsTo('App\Type', 'type');
    }

    public function statusTrade()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function moneyTrade()
    {
        return $this->belongsTo('App\Money', 'money');
    }

    public function trade1Trade()
    {
        return $this->belongsToMany('App\TradeDetail', 'trade1');
    }

    public function trade2Trade()
    {
        return $this->belongsToMany('App\TradeDetail', 'trade2');
    }
}
