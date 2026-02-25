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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('minister')->nullable();
            $table->text('description')->nullable();
            $table->string('audio_path');
            $table->date('sermon_date')->nullable();
            $table->year('year')->nullable();
            $table->unsignedTinyInteger('month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sermons');
    }
};
