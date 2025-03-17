<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->foreignId('blog_id')->constrained()->onDelete('cascade'); // Assuming 'blogs' table exists, foreign key to blog_id
            $table->string('name', 50)->nullable(); // 'name' column
            $table->text('comment')->nullable(); // 'comment' column
            $table->tinyInteger('status')->default(1); // 'status' column (default to 1)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
