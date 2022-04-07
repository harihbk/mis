<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevertNutsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revert_nuts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('minimun_order_quantity')->nullable();
            $table->string('brand')->nullable();
            $table->string('warranty')->nullable();
            $table->string('air_consumption')->nullable();
            $table->string('handle_type')->nullable();
            $table->string('air_pressure')->nullable();
            $table->string('air_inlet')->nullable();
            $table->string('rivet_diameter')->nullable();
            $table->string('part_number')->nullable();
            $table->string('stroke_length')->nullable();
            $table->string('delivert_time')->nullable();
            $table->string('packaging_details')->nullable();
            $table->string('key_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('revert_nuts');
    }
}
