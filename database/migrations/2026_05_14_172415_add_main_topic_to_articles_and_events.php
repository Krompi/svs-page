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
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('main_topic_id')->nullable()->constrained('topics')->nullOnDelete();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('main_topic_id')->nullable()->constrained('topics')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['main_topic_id']);
            $table->dropColumn('main_topic_id');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['main_topic_id']);
            $table->dropColumn('main_topic_id');
        });
    }
};
