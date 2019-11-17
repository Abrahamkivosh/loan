<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'image'=>$faker->randomElement(['noimage.jpg','noimage.jpg']),
        'job_title'=>$faker->randomElement(['Teacher','Police Officer','Accountant','Farmer']),
        'user_id'=>function(){return App\User::all()->random();},
        'description'=>$faker->realText(200,4)
    ];
});
