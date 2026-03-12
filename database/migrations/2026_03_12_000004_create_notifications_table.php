<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('type');
                $table->morphs('notifiable');
                $table->text('data');
                $table->timestamp('read_at')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('notifications') && ! Schema::hasIndex('notifications', 'notifications_notifiable_read_created_index')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->index(
                    ['notifiable_type', 'notifiable_id', 'read_at', 'created_at'],
                    'notifications_notifiable_read_created_index'
                );
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('notifications') && Schema::hasIndex('notifications', 'notifications_notifiable_read_created_index')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->dropIndex('notifications_notifiable_read_created_index');
            });
        }

        if (Schema::hasTable('notifications')) {
            Schema::dropIfExists('notifications');
        }
    }
};
