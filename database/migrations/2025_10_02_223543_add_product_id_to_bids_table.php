<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('bids', function (Blueprint $table) {
            // add product_id column after auction_id
            $table->foreignId('product_id')
                  ->after('auction_id')
                  ->constrained('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('bids', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
