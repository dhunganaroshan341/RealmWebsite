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
        Schema::table('settings', function (Blueprint $table) {
            $table->json('home_welcome_content')->nullable();
            /**
             *    {
             * "title": "Welcome to Our Platform",
             * "subtitle": "Your journey starts here",
             * "description": "This is a detailed description that can be around 200 words long...",
             * "image": "uploads/home_welcome.jpg"
             * }
             */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('home_welcome_content');
        });
    }
};
