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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();$table->string('name');
            $table->integer('price');
            $table->string('photo');
            $table->foreignId('categorie_id')->references('id')->on('categories')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};