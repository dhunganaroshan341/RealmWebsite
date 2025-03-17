<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 255); // 'email' column
            $table->string('token', 255); // 'token' column
            $table->timestamp('created_at')->nullable(); // 'created_at' column (nullable)

            $table->primary(['email', 'token']); // Composite primary key on 'email' and 'token'
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
