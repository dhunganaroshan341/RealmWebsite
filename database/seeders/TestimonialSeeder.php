<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create sample testimonials
        Testimonial::updateOrCreate([
            'id'=>1,
            'customer_name' => 'John Doe',
            'customer_position' => 'CEO of Example Corp',
            'testimonial_text' => 'This service is amazing! It helped us streamline our workflow.',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar1.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id'=>2,
            'customer_name' => 'Jane Smith',
            'customer_position' => 'Marketing Director',
            'testimonial_text' => 'Great customer service and easy to use.',
            'rating' => 4,
            'avatar_image' => 'path/to/avatar2.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id'=>3,
            'customer_name' => 'Emily Johnson',
            'customer_position' => 'Project Manager',
            'testimonial_text' => 'Fantastic experience, highly recommend!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar3.jpg',
            'is_active' => true,
        ]);
    }
}
