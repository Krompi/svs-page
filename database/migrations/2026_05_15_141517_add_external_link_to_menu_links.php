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
        Schema::table('menu_links', function (Blueprint $table) {
            $table->string('external_link')->nullable();
            $table->boolean('external_link_new_window')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_links', function (Blueprint $table) {
            $table->dropColumn(['external_link', 'external_link_new_window']);
        });
    }
};
