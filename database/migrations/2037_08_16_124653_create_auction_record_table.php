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
        Schema::create('auction_records', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('product_id');
    $table->unsignedBigInteger('winner_id')->nullable();
    $table->decimal('starting_price', 10, 2);
    $table->decimal('final_bid_price', 10, 2)->nullable(); 
    $table->string('contact_number');
    $table->timestamps();


    $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    $table->foreign('winner_id')->references('id')->on('user_records')->onDelete('set null');
    $table->foreign('contact_number')->references('phone')->on('user_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_records');
    }
};
