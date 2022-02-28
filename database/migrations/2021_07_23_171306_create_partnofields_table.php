<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnofieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnofields', function (Blueprint $table) {
            $table->id();
            $table->string('_label');
            $table->string('_value');
            $table->integer('_status');
            $table->unsignedBigInteger('product_part_number_id');
            $table->foreign('product_part_number_id')->references('id')->on('product_part_number');
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
        Schema::dropIfExists('partnofields');
    }
}
