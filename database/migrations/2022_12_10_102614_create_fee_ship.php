<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_ship', function (Blueprint $table) {
            $table->string('fee_id')->autoIncrement();
            $table->integer('fee_city');
            $table->integer('fee_province');
            $table->integer('fee_wards');
            $table->string('fee_feeship', '50');
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
        Schema::dropIfExists('fee_ship');
    }
};
