<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductpartnumberSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productpartnumber_specification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_part_number_id');
            $table->foreign('product_part_number_id')->references('id')->on('product_part_number');
            $table->unsignedBigInteger('specification_id');
            $table->foreign('specification_id')->references('id')->on('specification');
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
        Schema::dropIfExists('productpartnumber_specification');
    }
}
