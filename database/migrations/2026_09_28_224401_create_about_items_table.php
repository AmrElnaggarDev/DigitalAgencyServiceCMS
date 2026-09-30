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
        Schema::create('about_items', function (Blueprint $table) {
            $table->id();
            $table->text('photo1')->nullable();
            $table->text('photo2')->nullable();
            $table->text('photo3')->nullable();
            $table->text('photo4')->nullable();
            $table->text('year')->nullable();
            $table->text('subheading')->nullable();
            $table->text('heading')->nullable();
            $table->text('item1_heading')->nullable();
            $table->text('item1_text')->nullable();
            $table->text('item1_icon')->nullable();
            $table->text('item2_heading')->nullable();
            $table->text('item2_text')->nullable();
            $table->text('item2_icon')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_items');
    }
};
