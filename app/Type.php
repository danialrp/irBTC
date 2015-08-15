<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function tradeType()
    {
        return $this->hasMany('App\Trade', 'type');
    }

    public function transactionType()
    {
        return $this->hasMany('App\Transaction', 'type');
    }
}
