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
        Schema::create('course_add_models', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('instructor_id')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('category')->nullable();
            $table->string('total_lesson')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('final_price')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_add_models');
    }
};
