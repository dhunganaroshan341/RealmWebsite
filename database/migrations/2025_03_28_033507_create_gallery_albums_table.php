<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Album title
            $table->enum('type', ['image', 'video', 'pdf', 'other']); // Type of album
            $table->unsignedBigInteger('client_id')->nullable(); // Links to a client
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('gallery_albums');
    }
};
