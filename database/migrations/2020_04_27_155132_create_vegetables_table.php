<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVegetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vegetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vegId');
            $table->string('grade');
            $table->string('rate');
            $table->string('quantity');
            $table->string('date')->nullable();
            $table->string('freeQuantity')->nullable();
            $table->unsignedBigInteger('farmerId');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vegId')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('farmerId')->references('id')->on('users')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vegetables');
    }
}
