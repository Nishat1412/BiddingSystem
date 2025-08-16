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
        Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('product_name');
    $table->unsignedBigInteger('user_id');
    $table->string('product_image')->nullable();
    $table->text('product_description')->nullable();
     $table->string('category', 100);
    $table->float('product_price');
    $table->float('product_rating')->default(0);
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('user_records')->onDelete('cascade');
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
