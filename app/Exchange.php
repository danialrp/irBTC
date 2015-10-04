<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{

    protected $table = 'exchanges';


    public function ownerExchange()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function typeExchange()
    {
        return $this->belongsTo('App\Type', 'type');
    }

    public function statusExchange()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function moneyExchange()
    {
        return $this->belongsTo('App\money', 'money');
    }
}
