<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function money()
    {
        return $this->belongsTo('App\Money', 'money');
    }
}
