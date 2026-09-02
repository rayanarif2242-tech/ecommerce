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
    Schema::create('varieties', function (Blueprint $table) {
        $table->id();

        $table->uuid('variety_id')->unique();

        $table->uuid('product_id')->nullable();

        $table->string('title');
        $table->string('subtitle')->nullable();

        $table->string('button_text')->nullable();
        $table->string('button_link')->nullable();

        $table->string('image')->nullable();
        $table->string('mobile_image')->nullable();

        $table->string('position')->nullable();

        $table->boolean('featured')->default(false);

        $table->enum('status', ['active', 'inactive'])
              ->default('active');

        $table->integer('sort_order')->default(0);

        $table->dateTime('start_date')->nullable();
        $table->dateTime('end_date')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varieties');
    }
};
