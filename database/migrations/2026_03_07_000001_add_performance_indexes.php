<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('articles') && ! Schema::hasIndex('articles', 'articles_slug_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->index('slug');
            });
        }

        if (Schema::hasTable('articles') && ! Schema::hasIndex('articles', 'articles_is_published_created_at_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->index(['is_published', 'created_at']);
            });
        }

        if (Schema::hasTable('suggestions') && ! Schema::hasIndex('suggestions', 'suggestions_status_index')) {
            Schema::table('suggestions', function (Blueprint $table) {
                $table->index('status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('articles') && Schema::hasIndex('articles', 'articles_slug_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropIndex('articles_slug_index');
            });
        }

        if (Schema::hasTable('articles') && Schema::hasIndex('articles', 'articles_is_published_created_at_index')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropIndex('articles_is_published_created_at_index');
            });
        }

        if (Schema::hasTable('suggestions') && Schema::hasIndex('suggestions', 'suggestions_status_index')) {
            Schema::table('suggestions', function (Blueprint $table) {
                $table->dropIndex('suggestions_status_index');
            });
        }
    }
};
