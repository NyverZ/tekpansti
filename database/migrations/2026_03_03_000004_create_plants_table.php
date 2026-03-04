<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('local_name', 150)->index();
            $table->string('scientific_name', 180)->unique();
            $table->string('slug', 200)->unique();
            $table->longText('description')->nullable();
            $table->longText('health_benefits')->nullable();
            $table->longText('processing_potential')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
