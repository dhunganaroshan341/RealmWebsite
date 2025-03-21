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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // Name of the customer
            $table->string('customer_position')->nullable(); // Optional field for the customer's position
            $table->text('testimonial_text'); // Testimonial content
            $table->text('testimonial_title')->nullable(); // Testimonial content
            $table->integer('rating')->nullable(); // Optional rating (e.g., 1-5 stars)
            $table->string('avatar_image')->nullable(); // Path to the customer's avatar image (optional)
            $table->boolean('is_active')->default(true); // Flag to determine if the testimonial is active
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
