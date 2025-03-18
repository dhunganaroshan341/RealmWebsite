<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * {
       *    "service":{
       *       "service_id": 1,
       *    "custom_service_name": "Web Development",
       * }
       *    "category": "Web",
       *    "client": {
       *        "client_id": 123,
       *        "client_name": "ABC Corp"
       *   },    "custom_client_name":"this client ",
       *    },
       *    "content": {
       *        "url": "https://example.com"
       *    },
       *    "custom_flag": false
       *    }
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->json('portfolio_data'); // JSON field to store all the portfolio-related data
            $table->boolean('is_active')->default(true); // Portfolio status (active or inactive)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
