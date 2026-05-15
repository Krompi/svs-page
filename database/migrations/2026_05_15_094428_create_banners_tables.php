<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->integer('position')->unsigned()->nullable();

            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('banner_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'banner');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('banner_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'banner');
        });

        Schema::create('banner_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'banner');
        });
    }

    public function down()
    {
        Schema::dropIfExists('banner_revisions');
        Schema::dropIfExists('banner_translations');
        Schema::dropIfExists('banner_slugs');
        Schema::dropIfExists('banners');
    }
};
