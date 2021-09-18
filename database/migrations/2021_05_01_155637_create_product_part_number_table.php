<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPartNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_part_number', function (Blueprint $table) {
            $table->id();
            $table->string('part_number')->nullable();
            $table->string('dates_to_ship')->nullable();
            $table->string('nominal_thread_m')->nullable();
            $table->string('nominal_thread_inch')->nullable();
            $table->string('product_length')->nullable();
            $table->string('pinch')->nullable();
            $table->string('detailed_ship')->nullable();
            $table->string('mounting_hole_shape')->nullable();
            $table->string('basic_shape')->nullable();  
            $table->string('material')->nullable(); 
            $table->string('surface_treatment')->nullable();  
            $table->string('tip_shape')->nullable();  
            $table->string('additional_shape')->nullable();
            $table->string('sales_unit')->nullable();
            $table->string('application')->nullable();
            $table->string('strength_class_steel')->nullable();
            $table->string('strength_class_stainless_steel')->nullable();
            $table->string('screw_type')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('sale_discount')->nullable();
            $table->string('cad')->nullable();
            $table->string('modified_by')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->softDeletes();
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
        Schema::dropIfExists('product_part_number');
    }
}
