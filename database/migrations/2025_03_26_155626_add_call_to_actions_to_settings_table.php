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
            //
            $table->longText('cta_title')->nullable();
            $table->longText('cta_description')->nullable();
            $table->string('cta_image')->nullable();
            $table->longText('cta_link')->nullable();
            $table->string('cta_link_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('cta_title');
            $table->dropColumn('cta_description');
            $table->dropColumn('cta_image');
            $table->dropColumn('cta_link');
            $table->dropColumn('cta_link_text');
        });
    }
};
