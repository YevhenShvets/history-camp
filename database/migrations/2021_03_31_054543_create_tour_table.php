<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->dateTime('date_start');
            $table->integer('days');
            $table->integer('price_1');
            $table->integer('price_2');
            $table->mediumText('in_price')->nullable();
            $table->mediumText('not_in_price')->nullable();
            $table->mediumText('short_description');
            $table->longText('long_description');
            $table->string('complexity');
            $table->boolean('isDiscount')->nullable();
            $table->longText('additional_information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour');
    }
}
