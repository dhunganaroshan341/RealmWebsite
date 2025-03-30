<?php
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;

 return new class extends Migration {
     public function up() {
         Schema::create('gallery_media', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('gallery_album_id'); // Links to an album
             $table->string('file_path'); // Stores multiple file paths (JSON)
             $table->timestamps();

             // Foreign key to gallery_albums table
             $table->foreign('gallery_album_id')->references('id')->on('gallery_albums')->onDelete('cascade');
         });
     }

     public function down() {
         Schema::dropIfExists('gallery_media');
     }
 };
