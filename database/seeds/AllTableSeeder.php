<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bank::class,5)->create();

        // App\Admin::create([
        //     'name' =>'John Maina',
        //     'bank_id' => function(){return App\Bank::all()->random(); },
        //     'email' => 'jontejosh23@gmail.com',
        //     'phone'=> '0798570361',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        //     ]);

                // DB::table('admins')->insert([
                //     'name' =>'John Maina',
                //     'bank_id' => function(){return App\Bank::all()->random(); },
                //     'email' => 'jontejosh23@gmail.com',
                //     'password' => bcrypt('secret'),
                //     'email_verified_at' => now(),
                //     'remember_token' => Str::random(10),
                // ]);

                DB::table('users')->insert([
                    'name' =>"John Maina",
                    'email' => "jontejosh23@gmail.com",
                    'phone'=>"0798570361",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                ]);

        factory(App\Admin::class,10)->create();
        factory(App\Account::class,10)->create();
        factory(App\User::class,20)->create();
        factory(App\Payable::class,20)->create();
        factory(App\Loan::class,15)->create();
        factory(App\UserProfile::class,10)->create();
    }
}
