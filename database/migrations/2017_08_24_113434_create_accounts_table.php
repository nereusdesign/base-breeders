<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accountName');
            $table->string('accountKey')->unique();
            $table->string('stripePayAmount');
            $table->float('amount', 8, 2);
            $table->string('stripeTimeAmount');
            $table->string('timeAmount');
            $table->timestamps();
            $table->smallInteger('ready')->unsigned()->default('0');
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
