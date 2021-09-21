<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('donations', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('donation');
        $table->string('image_path');
        $table->string('description');
        $table->unsignedBigInteger('user_id');
        $table->boolean('resolved')->default(false);
        $table->unsignedBigInteger('donated_to')->nullable();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('donated_to')->references('id')->on('users');

        $table->timestamps();
      });

      Schema::create('requests', function (Blueprint $table) {
       $table->bigIncrements('id');
       $table->unsignedBigInteger('donation_id'); // the donation
       $table->unsignedBigInteger('user_id'); // the user that likes to take the donation
       $table->string('request_plea');

       $table->foreign('user_id')->references('id')->on('users');
       $table->foreign('donation_id')->references('id')->on('donations');

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
      Schema::dropIfExists('requests');
      Schema::dropIfExists('donations');
    }
}
