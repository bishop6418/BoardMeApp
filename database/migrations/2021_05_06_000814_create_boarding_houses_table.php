<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('image_id');
            $table->integer('status');

            $table->unsignedBigInteger('rating_id')->nullable();
            $table->foreign('rating_id')
            ->references('id')->on('ratings');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
            ->references('id')->on('categories');

            $table->string('address_address')->nullable();
            $table->string('address_latitude')->nullable();
            $table->string('address_longitude')->nullable();
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
        Schema::dropIfExists('boarding_houses');
    }
}
