<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];

    public function accounts()
    {
        return $this->hasMany('App\Account', 'bank_id', 'id');
    }

    public function payables()
    {
        return $this->hasMany('App\Payable', 'bank_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin', 'bank_id', 'id');
    }
    public function loans()
    {
        return $this->hasMany('App\Loan', 'bank_id', 'id');
    }
}
