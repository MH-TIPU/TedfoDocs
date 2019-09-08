<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code_sku');
            $table->string('description');
            $table->string('quantity');
            $table->string('unit');
            $table->string('hs_code');
            $table->string('gross_weight');
            $table->string('country_of_origin');
            $table->string('price');
            $table->string('product_name');
            $table->string('amount');
            $table->string('proforma_id');

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
        Schema::dropIfExists('product_details');
    }
}
