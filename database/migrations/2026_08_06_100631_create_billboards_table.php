<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billboards', function (Blueprint $table) {

            $table->id();

            $table->uuid('billboard_id')->unique();

            $table->string('title');

            $table->string('subtitle')->nullable();

            $table->string('button_text')->nullable();

            $table->string('button_link')->nullable();

            $table->string('image')->nullable();

            $table->string('mobile_image')->nullable();

            $table->enum('position', [
                'Home Top',
                'Home Middle',
                'Sidebar',
                'Popup'
            ])->default('Home Top');

            $table->boolean('featured')->default(0);

            $table->boolean('status')->default(1);

            $table->integer('sort_order')->default(0);

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billboards');
    }
};