<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'bank_id'=>function(){return App\Bank::all()->random();},
        'number'=>$faker ->numberBetween(100000,9999000),
        'amount'=>$faker ->numberBetween(10900,999000),
        'max'=>$faker ->numberBetween(100,90000),
        'min'=>$faker ->numberBetween(100,99000),
        'type'=>$faker->randomElement(['Loan','PataLoan'])
    ];
});
