<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payable;
use Faker\Generator as Faker;

$factory->define(Payable::class, function (Faker $faker) {
    return [
        'user_id'=>function(){return App\User::all()->random();},
        'bank_id'=>function(){return App\Bank::all()->random();},
        'amount'=>$faker ->numberBetween(100,990000),
        'number'=>$faker ->numberBetween(100000,9999000),
        'type'=>$faker->randomElement(['Loan','PataLoan'])

    ];
});
