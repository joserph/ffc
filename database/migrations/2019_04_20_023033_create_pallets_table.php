<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pallets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('counter');
            $table->string('number');
            $table->integer('in_pallet')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('id_load')->unsigned();
            $table->integer('id_user')->unsigned();            
            $table->integer('update_user')->nullable();
            
            $table->foreign('id_load')->references('id')->on('loads')->onDelete('cascade');
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
        Schema::dropIfExists('pallets');
    }
}
