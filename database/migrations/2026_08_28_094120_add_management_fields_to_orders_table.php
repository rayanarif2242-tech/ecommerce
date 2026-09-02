<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('orders', 'order_number')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('order_number')
                    ->unique()
                    ->after('order_id');
            });
        }

        if (!Schema::hasColumn('orders', 'payment_status')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('payment_status')
                    ->default('Pending')
                    ->after('payment_method');
            });
        }

        if (!Schema::hasColumn('orders', 'fulfillment_status')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('fulfillment_status')
                    ->default('Unfulfilled')
                    ->after('payment_status');
            });
        }

        if (!Schema::hasColumn('orders', 'delivery_status')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('delivery_status')
                    ->default('Pending')
                    ->after('fulfillment_status');
            });
        }

        if (!Schema::hasColumn('orders', 'delivery_method')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('delivery_method')
                    ->default('Standard Delivery')
                    ->after('delivery_status');
            });
        }
    }

    public function down()
    {
        $columns = [
            'order_number',
            'payment_status',
            'fulfillment_status',
            'delivery_status',
            'delivery_method',
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('orders', $column)) {
                Schema::table('orders', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};