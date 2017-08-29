<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZipCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('zip_code', function (Blueprint $table) {
          $table->increments('zip_code_id');
          $table->string('zip_code',50);
          $table->string('city',255);
          $table->string('country',10);
          $table->string('state_name',50);
          $table->string('state_prefix',255);
          $table->string('area_code',3);
          $table->string('time_zone',50);
          $table->string('fips_regions',50);
          $table->float('lat',10,5);
          $table->float('lon',10,5);
          $table->string('url',100);
      });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('zip_code');
    }
}
