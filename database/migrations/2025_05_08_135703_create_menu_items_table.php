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
    Schema::create('menu_items', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('price');
        $table->string('category'); // e.g., 'prasmanan', 'topping', 'paketan', 'minuman'
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
