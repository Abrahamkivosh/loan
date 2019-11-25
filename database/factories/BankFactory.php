<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    // $filepath = storage_path('bank');

    // if(!File::exists($filepath)){
    //     File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    // };


    return [
        'name'=>$faker->word,
        'image'=>'bank.jpg',
        'description'=>$faker->realText(200,4)
    ];});
