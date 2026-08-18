<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {

            $table->id();

            $table->uuid('collection_id')->unique();

            $table->string('name');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('thumbnail')->nullable();

            $table->string('banner')->nullable();

            $table->string('icon')->nullable();

            $table->boolean('featured')->default(0);

            $table->boolean('show_home')->default(0);

            $table->boolean('status')->default(1);

            $table->integer('sort_order')->default(0);

            $table->string('seo_title')->nullable();

            $table->string('seo_keywords')->nullable();

            $table->text('seo_description')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};