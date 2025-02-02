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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('desc');
            $table->string('video_path');
            $table->string('image_path')->nullable();
            $table->string('hours')->default(0);
            $table->string('minutes')->default(0);
            $table->string('seconds')->default(0);
            $table->string('quality')->default(0);
            $table->boolean('processed')->default(false);
            $table->boolean('longitudinal')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
