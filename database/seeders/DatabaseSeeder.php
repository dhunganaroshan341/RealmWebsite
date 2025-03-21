<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AdminSeeder::class); // This will run the AdminSeeder
        $this->call(ServiceSeeder::class); // This will run the AdminSeeder
        $this->call(TestimonialSeeder::class); // This will run the AdminSeeder
        $this->call(BannerSliderSeeder::class); // This will run the AdminSeeder


    }
}
