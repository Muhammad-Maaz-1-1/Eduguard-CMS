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
        Schema::create('profile_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->text('about')->nullable();
            $table->string('skill')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nationality')->nullable();
            $table->text('education_description')->nullable();
            $table->string('education_title')->nullable();
            $table->date('education_date')->nullable();
            $table->string('experience_title')->nullable();
            $table->text('experience_description')->nullable();
            $table->date('experience_date')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_models');
    }
};
