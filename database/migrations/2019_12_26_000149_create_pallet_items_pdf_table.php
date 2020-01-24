<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalletItemsPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pallet_items_pdf', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_farm')->unsigned();
            $table->integer('id_client')->unsigned();
            $table->integer('id_pallet')->unsigned();
            $table->integer('id_load')->unsigned();
            $table->integer('quantity')->nullable();
            $table->integer('hb')->nullable();
            $table->integer('qb')->nullable();
            $table->integer('eb')->nullable();
            $table->integer('piso')->nullable();
            $table->string('farms')->nullable();
            $table->integer('id_user')->unsigned();            
            $table->integer('update_user')->nullable();
            $table->double('fulls', 8, 2)->nullable();
            $table->string('items_id_pallets')->nullable();

            $table->foreign('id_farm')->references('id')->on('farms')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('id_pallet')->references('id')->on('pallets')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users');

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
        Schema::dropIfExists('pallet_items_pdf');
    }
}
