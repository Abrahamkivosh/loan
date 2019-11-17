<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('amount');

            $table->integer('user_id')->unsigned();

            $table->integer('bank_id')->unsigned();
            $table->string('status')->default(0); //padding == 0  cancelled == 1 approved == 2
            $table->text('description')->nullable();


            $table->string('type', 100)->default('Normal');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
