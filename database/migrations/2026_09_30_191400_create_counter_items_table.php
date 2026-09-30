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
        Schema::create('counter_items', function (Blueprint $table) {
            $table->id();
            $table->text('photo')->nullable();
            $table->text('item1_icon')->nullable();
            $table->text('item1_number')->nullable();
            $table->text('item1_text')->nullable();
            $table->text('item2_icon')->nullable();
            $table->text('item2_number')->nullable();
            $table->text('item2_text')->nullable();
            $table->text('item3_icon')->nullable();
            $table->text('item3_number')->nullable();
            $table->text('item3_text')->nullable();
            $table->text('item4_icon')->nullable();
            $table->text('item4_number')->nullable();
            $table->text('item4_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_items');
    }
};
