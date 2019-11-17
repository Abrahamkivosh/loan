<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank', 'bank_id', 'id');
    }
}
