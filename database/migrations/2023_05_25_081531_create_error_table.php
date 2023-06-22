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
        Schema::create('error', function (Blueprint $table) {
            $table->id();
            $table->string('error_id');
            $table->unsignedBigInteger('equipment_id');
            $table->string('troubleshooter');
            $table->string('description');
            $table->string('error_type');
            $table->boolean('stand');
            $table->integer('injured');
            $table->string('recorder');
            $table->string('whistleblower');
            $table->string('phone');
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('equipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error');
    }
};
