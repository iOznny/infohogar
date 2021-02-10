<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('state');
            $table->string('municipality');
            $table->string('typepost');
            $table->integer('price');
            $table->string('currency');
            $table->string('description');
            $table->string('typeproperty');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('halfbath');
            $table->integer('parking');
            $table->string('path');
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
        Schema::dropIfExists('properties');
    }
}
