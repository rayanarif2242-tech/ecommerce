<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('payment_status')
                ->default('Pending')
                ->after('payment_method');

            $table->string('fulfillment_status')
                ->default('Unfulfilled')
                ->after('payment_status');

            $table->string('delivery_status')
                ->default('Pending')
                ->after('fulfillment_status');

            $table->string('delivery_method')
                ->default('Standard Delivery')
                ->after('delivery_status');

        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'payment_status',
                'fulfillment_status',
                'delivery_status',
                'delivery_method',
            ]);

        });
    }
};