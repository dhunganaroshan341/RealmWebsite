<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('name', 100); // 'name' column (required, maximum length 100)
            $table->text('content')->nullable(); // 'content' column (TEXT type, nullable)
            $table->string('image', 50)->nullable(); // 'image' column (nullable, maximum length 50)
            $table->tinyInteger('status')->default(1); // 'status' column (default to 1)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
