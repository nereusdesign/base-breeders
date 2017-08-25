<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('breedType',3)->default('dog');
            $table->string('originLocation');
            $table->string('breedName');
            $table->string('otherNames')->nullable();
            $table->string('picture')->nullable();
            $table->string('size');
            $table->string('lifeSpan');
            $table->text('temperamentList');
            $table->string('height');
            $table->string('weight');
            $table->text('colorsList');
            $table->integer('stars_child')->unsigned()->default('0');
            $table->text('child');
            $table->integer('stars_dog')->unsigned()->default('0');
            $table->text('dog');
            $table->integer('stars_grooming')->unsigned()->default('0');
            $table->text('grooming');
            $table->integer('stars_shedding')->unsigned()->default('0');
            $table->text('shedding');
            $table->integer('stars_vocalize')->unsigned()->default('0');
            $table->text('vocalize');
            $table->text('overview');
            $table->text('history');
            $table->text('personality');
            $table->text('description');
//state dog only values
            $table->integer('stars_apartment')->unsigned()->default('0');
            $table->text('apartment');
            $table->integer('stars_cat')->unsigned()->default('0');
            $table->text('cat');
            $table->integer('stars_exercise')->unsigned()->default('0');
            $table->text('exercise');
            $table->integer('stars_training')->unsigned()->default('0');
            $table->text('training');
            $table->string('pureMixed');
//end dog only values
//start cat only values
            $table->integer('stars_affectionate')->unsigned()->default('0');
            $table->text('affectionate');
            $table->integer('stars_playfulness')->unsigned()->default('0');
            $table->text('playfulness');
            $table->string('lapCat');
//end cat only cols
            $table->smallInteger('ready')->default('0');
            $table->timestamp('lastPosted');
            $table->timestamps();
            $table->string('url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
}
