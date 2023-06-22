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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('legacy_reference')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('equipment')->nullable();
            $table->string('emi')->nullable();
            $table->string('type')->nullable();
            $table->string('work_center')->nullable();
            $table->string('rated_load')->nullable();
            $table->string('inventory_number')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('equipment');
    }
};
