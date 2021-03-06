<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->string('description');
            $table->float('price');
            $table->integer('unit_figure');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id');
            $table->boolean('visibility');
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('subcat_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
