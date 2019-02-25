<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
          $table->uuid('id')->primary();
          $table->string('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('location');
          $table->text('item');
          $table->date('start');
          $table->date('end');
          $table->double('price', 8,2);
          $table->boolean('active')->default(false);
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
        Schema::dropIfExists('listings');
    }
}
