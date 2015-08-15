<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $table = 'trades';

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'type');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function money()
    {
        return $this->belongsTo('App\Money', 'money');
    }

    public function trade1()
    {
        return $this->belongsToMany('App\TradeDetail', 'trade1');
    }

    public function trade2()
    {
        return $this->belongsToMany('App\TradeDetail', 'trade2');
    }
}
