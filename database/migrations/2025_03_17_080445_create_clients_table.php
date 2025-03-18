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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Client's full name
            $table->string('email')->unique(); // Client's email address
            $table->string('phone')->nullable(); // Client's phone number
            $table->text('address')->nullable(); // Client's address
            $table->enum('status', ['active', 'inactive'])->default('active'); // Client's status
            $table->string('logo')->nullable(); // Path to the client's logo image (nullable)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
