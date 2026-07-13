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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text("summary")->nullable();
            $table->string("author")->nullable();
            $table->string("file")->nullble();
            $table->enum("status",["Not yet available on Amazon","Available on Amazon"])->default("Not yet available on Amazon");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
