<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plant_region', function (Blueprint $table) {
            $table->foreignId('plant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->enum('abundance_level', ['low', 'medium', 'high'])->default('medium');
            $table->string('notes', 255)->nullable();
            $table->timestamps();

            $table->primary(['plant_id', 'region_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plant_region');
    }
};
