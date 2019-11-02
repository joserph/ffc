<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFielsInCoordination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coordinations', function($table)
		{
            $table->string('description')->nullable();
            $table->string('farms')->nullable();
            $table->integer('pieces_r')->nullable();
            $table->integer('fb_r')->nullable();
            $table->integer('hb_r')->nullable();
            $table->integer('qb_r')->nullable();
            $table->integer('eb_r')->nullable();
            $table->double('fulls_r', 8, 2)->nullable();
            $table->string('missing')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coordinations', function($table)
		{
            $table->dropColumn('description');
            $table->dropColumn('farms');
            $table->dropColumn('pieces_r');
            $table->dropColumn('fb_r');
            $table->dropColumn('hb_r');
            $table->dropColumn('qb_r');
            $table->dropColumn('eb_r');
            $table->dropColumn('fulls_r');
            $table->dropColumn('missing');
            $table->dropColumn('total');
		});
    }
}
