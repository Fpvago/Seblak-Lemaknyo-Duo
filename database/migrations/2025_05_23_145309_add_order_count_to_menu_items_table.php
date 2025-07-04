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
    Schema::table('menu_items', function (Blueprint $table) {
        $table->unsignedInteger('order_count')->default(0)->after('price');
    });
}

public function down(): void
{
    Schema::table('menu_items', function (Blueprint $table) {
        $table->dropColumn('order_count');
    });
}

};
