<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPisoInPalletItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pallet_items', function($table)
		{
            $table->integer('piso')->nullable();
            $table->string('farms')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pallet_items', function($table)
		{
            $table->dropColumn('piso');
            $table->dropColumn('farms');
		});
    }
}
