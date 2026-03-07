<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->index('slug');
            $table->index(['is_published', 'created_at']);
        });

        Schema::table('suggestions', function (Blueprint $table) {
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['is_published', 'created_at']);
        });

        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });
    }
};
