<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconToProductPartNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_part_number', function (Blueprint $table) {
            $table->string('icon')->nullable();
            $table->string('quantity')->nullable();
            $table->string('original_price')->nullable();
            $table->string('dash_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_part_number', function (Blueprint $table) {
            //
        });
    }
}
