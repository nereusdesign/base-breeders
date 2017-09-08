<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Breeders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('breeders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('userId')->references('id')->on('users');
          $table->string('breederName');
          $table->integer('breedId')->references('id')->on('breeds');
          $table->string('email');
          $table->string('zipcode')->references('zip_code')->on('zip_code');
          $table->string('baseUrl');
          $table->string('url');
          $table->string('phone');
          $table->string('randomKey')->unique();
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
        //
        Schema::dropIfExists('breeders');
    }
}
