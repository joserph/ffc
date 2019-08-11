<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSketchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sketches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_pallet_items')->unsigned()->nullable();
            $table->integer('id_load')->unsigned();
            $table->string('position');
            $table->foreign('id_pallet_items')->references('id')->on('pallet_items')->onDelete('cascade');
            $table->foreign('id_load')->references('id')->on('loads')->onDelete('cascade');

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
        Schema::dropIfExists('sketches');
    }
}
