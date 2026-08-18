<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('features', function (Blueprint $table) {

        $table->string('product_name')->after('feature_id');

        $table->string('image')->nullable()->after('product_name');

        $table->decimal('price', 10, 2)->default(0)->after('image');

        $table->decimal('discount', 10, 2)->default(0)->after('price');

        $table->integer('stock')->default(0)->after('discount');

        $table->text('description')->nullable()->after('stock');

        $table->boolean('featured')->default(0)->after('description');

        $table->boolean('show_home')->default(0)->after('featured');

        $table->enum('status', ['active', 'inactive'])
              ->default('active')
              ->after('show_home');

        $table->integer('sort_order')->default(0)->after('status');
    });
}

   public function down()
{
    Schema::table('features', function (Blueprint $table) {

        $table->dropColumn([
            'product_name',
            'image',
            'price',
            'discount',
            'stock',
            'description',
            'featured',
            'show_home',
            'sort_order',
        ]);

    });
}
};