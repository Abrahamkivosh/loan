<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo('App\Bank', 'foreign_key', 'other_key');
    }

}
