<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('listing_id');
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->date('start');
            $table->date('end');
            $table->double('price', 8, 2);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->primary(['user_id', 'listing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
