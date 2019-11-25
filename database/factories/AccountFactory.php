<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'bank_id'=>function(){return App\Bank::all()->random();},
        'creditCardNumber'=>$faker->creditCardNumber,
        'amount'=>$faker ->numberBetween(10900,999000),
        'max'=>$faker ->numberBetween(10000,90000),
        'min'=>$faker ->numberBetween(1000,9999),
        'creditCardType'=>$faker->creditCardType
    ];
});
