<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->uuid('order_id')->unique();

            $table->string('name');
            $table->string('email');
            $table->string('phone');

            $table->text('address');
            $table->string('city');
            $table->string('postal_code')->nullable();

            $table->decimal('subtotal', 10, 2);
            $table->decimal('delivery', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->string('payment_method')->default('Cash on Delivery');

            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Processing',
                'Shipped',
                'Delivered',
                'Cancelled'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};