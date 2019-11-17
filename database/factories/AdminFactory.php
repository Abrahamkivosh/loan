<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'bank_id'=>function(){return App\Bank::all()->random();},
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->phoneNumber,
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
    ];
});
