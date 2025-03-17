<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{
    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('question', 255)->nullable(); // 'question' column with max length 255
            $table->text('answer')->nullable(); // 'answer' column (TEXT type)
            $table->tinyInteger('status')->default(1); // 'status' column (default to 1)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq');
    }
}
