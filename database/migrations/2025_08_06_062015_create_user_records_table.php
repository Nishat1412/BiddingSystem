<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_records', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('phone', 14)->nullable()->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_records');
    }
};
