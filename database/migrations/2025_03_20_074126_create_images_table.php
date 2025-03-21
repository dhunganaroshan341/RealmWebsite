<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_images_table.php

public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('gallery_id'); // Foreign key to galleries table
        $table->string('image_path'); // Path to the image
        $table->timestamps();

        $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('images');
}

};
