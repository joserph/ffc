<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSketchItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sketch_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_pallet')->unsigned();
            $table->string('number');
            $table->string('number_pallet');
            $table->string('code');
            $table->string('position');
            $table->foreign('id_pallet')->references('id')->on('pallets')->onDelete('cascade');

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
        Schema::dropIfExists('sketch_items');
    }
}
