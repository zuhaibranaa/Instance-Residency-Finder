<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
            $table->string('Title');
            $table->string('Location');
            $table->string('Property_Type');
            $table->unsignedBigInteger('Seller_ID');
            $table->foreign('Seller_ID')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('Latitude');
            $table->decimal('Longitude');
            $table->string('image');
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
