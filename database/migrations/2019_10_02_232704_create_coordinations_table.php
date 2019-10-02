<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('hawb')->nullable();
            $table->integer('id_farm')->unsigned()->nullable();
            $table->integer('id_client')->unsigned()->nullable();
            $table->integer('id_load')->unsigned()->nullable();
            $table->integer('pieces')->nullable();
            $table->integer('fb')->nullable();
            $table->integer('hb')->nullable();
            $table->integer('qb')->nullable();
            $table->integer('eb')->nullable();
            $table->double('fulls', 8, 2)->nullable();
            $table->double('total', 8, 2)->nullable();
            $table->integer('id_user')->unsigned();            
            $table->integer('update_user')->nullable();

            $table->foreign('id_farm')->references('id')->on('farms')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('coordinations');
    }
}
