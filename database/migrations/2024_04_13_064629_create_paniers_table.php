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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('state')->default('loading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
