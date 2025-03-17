<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->enum('role', ['user', 'admin'])->default('user'); // 'role' column with 'user' and 'admin' options
            $table->string('name'); // 'name' column
            $table->string('email')->unique(); // 'email' column (unique)
            $table->timestamp('email_verified_at')->nullable(); // 'email_verified_at' column (nullable)
            $table->string('password'); // 'password' column
            $table->string('remember_token', 100)->nullable(); // 'remember_token' column (nullable)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
