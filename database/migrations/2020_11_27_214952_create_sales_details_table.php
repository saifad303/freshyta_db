<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('sold_quantity');
            $table->string('customer_phone');
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('delivery_partner_id');
            $table->unsignedBigInteger('payment_status_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('notes');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('delivery_partner_id')->references('id')->on('delivery_partners');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_details');
    }
}
