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
    Schema::create('blogs', function (Blueprint $table) {

        $table->id();

        $table->uuid('blog_id')->unique()->index();

$table->string('title')->index();

        $table->string('slug')->unique();

        $table->string('image')->nullable();

        $table->string('category')->nullable();

        $table->string('author')->nullable();

        $table->text('short_description')->nullable();

        $table->longText('content')->nullable();

        $table->string('meta_title')->nullable();

        $table->text('meta_description')->nullable();

        $table->boolean('featured')->default(0);

        $table->boolean('show_on_home')->default(0);

        $table->boolean('status')->default(1);

        $table->integer('sort_order')->default(0);

        $table->timestamps();

    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
