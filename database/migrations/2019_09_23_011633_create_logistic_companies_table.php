<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('ruc');
            $table->string('address');
            $table->string('parish'); // Parroquia
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            
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
        Schema::dropIfExists('logistic_companies');
    }
}
