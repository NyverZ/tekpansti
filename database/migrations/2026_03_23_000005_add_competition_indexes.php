<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('articles') && ! Schema::hasIndex('articles', 'articles_created_at_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->index('created_at');
            });
        }

        if (Schema::hasTable('plants') && ! Schema::hasIndex('plants', 'plants_is_published_created_at_index')) {
            Schema::table('plants', function (Blueprint $table) {
                $table->index(['is_published', 'created_at']);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('articles') && Schema::hasIndex('articles', 'articles_created_at_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropIndex('articles_created_at_index');
            });
        }

        if (Schema::hasTable('plants') && Schema::hasIndex('plants', 'plants_is_published_created_at_index')) {
            Schema::table('plants', function (Blueprint $table) {
                $table->dropIndex('plants_is_published_created_at_index');
            });
        }
    }
};
