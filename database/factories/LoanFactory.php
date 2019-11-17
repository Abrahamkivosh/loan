<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    return [
        'amount'=>$faker ->numberBetween(1000,99000),
        'bank_id'=>function(){return App\Bank::all()->random();},
        'user_id'=>function(){return App\User::all()->random();},
        'status'=>$faker->randomElement([0,1,2]),
        'description'=>$faker->realText(100,4)
    ];
});
