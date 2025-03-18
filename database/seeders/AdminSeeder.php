<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import the User model

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the admin user already exists by email
        if (!User::where('email', 'admin@example.com')->exists()) {
            // Create an admin user
            User::create([
                'role' => 'admin',
                'name' => 'Admin Name', // Set the admin's name
                'email' => 'admin@example.com', // Set the admin's email
                'password' => Hash::make('adminpassword'), // Securely hash the password
            ]);
        }
    }
}
