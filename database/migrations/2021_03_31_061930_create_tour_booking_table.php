<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');

            $table->string('user_name');
            $table->string('user_surname');
            $table->string('user_phone');
            $table->string('user_email');
            $table->string('user_number_of_people');
            $table->dateTime('date_create');

            $table->foreign('tour_id')->references('id')->on('tour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_booking');
    }
}
