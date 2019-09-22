<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code')->nullable();
            $table->string('bl')->nullable();
            $table->string('carrier')->nullable();
            $table->string('invoice')->nullable();
            $table->date('date');
            $table->integer('id_user')->unsigned();            
            $table->integer('update_user')->nullable();
            
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
        Schema::dropIfExists('loads');
    }
}
