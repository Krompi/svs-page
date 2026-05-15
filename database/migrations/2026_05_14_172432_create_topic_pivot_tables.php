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
        Schema::create('article_topic', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
            $table->foreignId('topic_id')->constrained()->cascadeOnDelete();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('event_topic', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('topic_id')->constrained()->cascadeOnDelete();
            $table->integer('position')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_topic');
        Schema::dropIfExists('event_topic');
    }
};
