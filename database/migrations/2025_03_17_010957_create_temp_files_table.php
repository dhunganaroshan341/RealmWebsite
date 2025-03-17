<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempFilesTable extends Migration
{
    public function up()
    {
        Schema::create('temp_files', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('name', 255); // 'name' column (required, maximum length 255)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_files');
    }
}
