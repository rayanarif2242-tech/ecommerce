<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {

        $table->id();

        $table->uuid('product_id')->unique();

        $table->unsignedBigInteger('category_id');

        $table->string('name');

        $table->string('slug')->unique();

        $table->text('description')->nullable();

        $table->string('image')->nullable();

        $table->decimal('price',10,2);

        $table->decimal('discount_price',10,2)->nullable();

        $table->integer('stock')->default(0);

        $table->boolean('featured')->default(0);

        $table->boolean('home')->default(0);

        $table->boolean('status')->default(1);

        $table->integer('sort')->default(0);

        $table->timestamps();


        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
