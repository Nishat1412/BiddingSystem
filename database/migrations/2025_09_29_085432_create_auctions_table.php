<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('winner_id')->nullable()->constrained('user_records')->onDelete('set null');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->decimal('starting_price', 10, 2);
            $table->decimal('current_bid', 10, 2)->nullable();
            $table->enum('status', ['pending', 'active', 'finished', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('auctions');
        
    }
};