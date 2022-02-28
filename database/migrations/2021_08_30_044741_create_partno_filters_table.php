<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnoFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partno_filters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_part_number_id');
            $table->foreign('product_part_number_id')->references('id')->on('product_part_number');
            $table->unsignedBigInteger('specification_type_id');
            $table->foreign('specification_type_id')->references('id')->on('specification_type');
            $table->string('specification_id');
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
        Schema::dropIfExists('partno_filters');
    }
}
