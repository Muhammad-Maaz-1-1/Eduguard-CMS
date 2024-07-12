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
        Schema::table('course_add_models', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->index('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_add_models', function (Blueprint $table) {
            $table->index('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
        });

    }
};
