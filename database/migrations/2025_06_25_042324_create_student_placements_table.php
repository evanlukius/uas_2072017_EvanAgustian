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
        Schema::create('student_placements', function (Blueprint $table) {
            $table->id();
            $table->string('student_nim', 20);
            $table->unsignedBigInteger('period_id');
            $table->string('class', 50)->nullable();
            $table->timestamps();

            $table->foreign('student_nim')->references('nim')->on('students')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_placements');
    }
};
