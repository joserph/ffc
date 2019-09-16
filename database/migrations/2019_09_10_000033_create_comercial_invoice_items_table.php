<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComercialInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercial_invoice_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_invoiceh')->unsigned()->nullable();
            $table->integer('id_client')->unsigned()->nullable();
            $table->integer('id_farm')->unsigned()->nullable();
            $table->integer('id_load')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->string('hawb')->nullable();
            $table->integer('pieces')->nullable();
            $table->integer('hb')->nullable();
            $table->integer('qb')->nullable();
            $table->integer('eb')->nullable();
            $table->integer('stems')->nullable();
            $table->double('price')->nullable();
            $table->integer('bunches')->nullable();
            $table->double('fulls', 8, 2)->nullable();
            $table->double('total', 8, 2)->nullable();
            $table->integer('id_user')->unsigned();            
            $table->integer('update_user')->nullable();

            $table->foreign('id_invoiceh')->references('id')->on('invoice_headers')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('id_farm')->references('id')->on('farms')->onDelete('cascade');
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
        Schema::dropIfExists('comercial_invoice_items');
    }
}
