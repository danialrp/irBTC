<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeDetail extends Model
{
    protected $table = 'trade_details';

    public function trade1Detail()
    {
        return $this->belongsTo('App\Trade', 'trade1');
    }

    public function trade2Detail()
    {
        return $this->belongsTo('App\Trade', 'trade2');
    }
}
