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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id')->nullable();
            $table->string('lecture_title')->nullable();
            $table->string('lecture_video')->nullable();
            $table->string('lecture_resources')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            // Adjust 'chapters' with your actual table name where 'id' is the primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
