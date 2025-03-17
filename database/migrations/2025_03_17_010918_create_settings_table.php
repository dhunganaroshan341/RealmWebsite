<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('website_title', 100); // 'website_title' column (required, maximum length 100)
            $table->string('email', 100)->nullable(); // 'email' column (nullable)
            $table->string('phone', 50)->nullable(); // 'phone' column (nullable)
            $table->string('facebook_url', 50)->nullable(); // 'facebook_url' column (nullable)
            $table->string('twitter_url', 50)->nullable(); // 'twitter_url' column (nullable)
            $table->string('instagram_url', 50)->nullable(); // 'instagram_url' column (nullable)
            $table->text('contact_card_one')->nullable(); // 'contact_card_one' column (nullable, TEXT type)
            $table->text('contact_card_two')->nullable(); // 'contact_card_two' column (nullable, TEXT type)
            $table->text('contact_card_three')->nullable(); // 'contact_card_three' column (nullable, TEXT type)
            $table->string('copy', 100); // 'copy' column (required, maximum length 100)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
