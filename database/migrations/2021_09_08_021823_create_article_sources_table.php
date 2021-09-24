<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_sources', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->nullable();
            $table->string('type',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('link',255)->nullable();
            $table->string('document',255)->nullable();
            $table->string('document_path',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_sources');
    }
}
