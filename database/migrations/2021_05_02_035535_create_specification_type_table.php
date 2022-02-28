<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification_type', function (Blueprint $table) {
            $table->id();
            $table->string('spec_type')->nullable;
            $table->string('description')->nullable;
            $table->string('image')->nullable;
            $table->unsignedBigInteger('specification_id');
            $table->foreign('specification_id')->references('id')->on('specification');
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
        Schema::dropIfExists('specification_type');
    }
}
