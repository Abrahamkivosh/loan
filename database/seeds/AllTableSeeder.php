<?php

use Illuminate\Database\Seeder;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bank::class,10)->create();
        factory(App\Admin::class,10)->create();
        factory(App\Account::class,10)->create();
        factory(App\User::class,20)->create();
        factory(App\Payable::class,20)->create();
        factory(App\Loan::class,15)->create();
        factory(App\UserProfile::class,10)->create();
    }
}
