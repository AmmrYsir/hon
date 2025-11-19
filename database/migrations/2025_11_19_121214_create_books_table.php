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
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->decimal('price', 10, 2)->nullable(); // For selling
            $table->decimal('rent_price', 10, 2)->nullable(); // For renting
            $table->enum('type', ['sell', 'rent', 'read_online'])->default('read_online');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->string('cover_image')->nullable();
            $table->string('file_path')->nullable(); // PDF/Epub path
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
