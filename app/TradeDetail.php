<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeDetail extends Model
{
    protected $table = 'trade_details';

    public function trade1()
    {
        return $this->belongsToMany('App\Trade', 'trade1');
    }

    public function trade2()
    {
        return $this->belongsToMany('App\Trade', 'trade2');
    }
}
