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
        Schema::create('banner_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Title of the slider
            $table->text('description')->nullable();  // Description of the slider
            $table->string('subtitle')->nullable();  // Description of the slider
            $table->string('button_text')->nullable();  // Description of the slider
            $table->string('link')->nullable();  // Description of the slider

            $table->string('image');  // URL for the banner image
            $table->boolean('is_active')->default(true);  // Flag to mark if the banner is active
            $table->integer('order')->default(0);  // Order of the slider for displaying
            $table->timestamps();  // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_sliders');
    }
};
