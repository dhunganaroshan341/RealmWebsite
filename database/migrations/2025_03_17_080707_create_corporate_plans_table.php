<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * plan details example
     * $planDetails = [
    * 'services' => $services,
    * 'price' => $totalPrice,
   * 'custom_price' => false, // Set to false if price is auto-calculated
   * 'description' => 'This plan includes social media management and a booking engine at a discounted price.'
   * ];
     */

    public function up(): void
    {
        Schema::create('corporate_plans', function (Blueprint $table) {
            $table->id();
            $table->json('plan_details'); // JSON field to store plan details such as services, pricing, and description
            $table->string('background_image')->nullable(); // Path to the background image (nullable)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_plans');
    }
};
