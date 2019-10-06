<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStemsPerBunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comercial_invoice_items', function($table)
		{
		    $table->integer('stems_p_bunches')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comercial_invoice_items', function($table)
		{
		    $table->dropColumn('stems_p_bunches');
		});
    }
}
