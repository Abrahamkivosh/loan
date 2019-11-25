<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'image'=>$faker->jobTitle ,
        'job_title'=>$faker->jobTitle ,
        'user_id'=>function(){return App\User::all()->random();},
        'description'=>$faker->realText(200,4)
    ];
});
