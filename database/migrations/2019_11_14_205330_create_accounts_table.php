<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     * This are accounts that belong to banks only
     * they will be giving loan to account of uses (payables)
     * payables is the account of the user
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_id')->unsigned();
            $table->integer('creditCardNumber');
            $table->integer('amount')->nullable()->default(0);
            $table->integer('max')->nullable()->default(0);
            $table->integer('min')->nullable()->default(0);
            $table->string('creditCardType', 100)->default('Normal');
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
        Schema::dropIfExists('accounts');
    }
}
