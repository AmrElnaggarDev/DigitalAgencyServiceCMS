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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('preloader_status')->default('show')->after('page_banner');
            $table->string('preloader_icon')->nullable()->after('preloader_status');
            $table->string('preloader_logo')->nullable()->after('preloader_icon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['preloader_status', 'preloader_icon', 'preloader_logo']);
        });
    }
};
