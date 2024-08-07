<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_job', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('job_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_job');
    }
};
