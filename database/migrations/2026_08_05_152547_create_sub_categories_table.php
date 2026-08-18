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
        Schema::create('sub_categories', function (Blueprint $table) {

            $table->id();
            

            $table->uuid('subcategory_id')->unique();

            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->string('banner')->nullable();

            $table->string('icon')->nullable();

            $table->boolean('featured')->default(false);

            $table->boolean('show_on_home')->default(false);

            $table->boolean('status')->default(true);

            $table->integer('sort_order')->default(0);

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};