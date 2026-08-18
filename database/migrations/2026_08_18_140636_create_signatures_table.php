<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {

            $table->id();

            // UUID
            $table->string('signature_id')->unique();

            // Product information
            $table->string('product_name');
            $table->text('description')->nullable();

            // Price
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            // Image
            $table->string('image')->nullable();

            // Display settings
            $table->integer('sort_order')->default(0);
            $table->boolean('show_on_home')->default(false);

            // Status
            $table->enum('status', ['Active', 'Inactive'])
                  ->default('Active');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signatures');
    }
};