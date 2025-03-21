<?php
namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create sample testimonials with more diverse content
        Testimonial::updateOrCreate([
            'id' => 1,
            'customer_name' => 'John Doe',
            'customer_position' => 'CEO of Example Corp',
            'testimonial_text' => 'This service is a game-changer! It helped us streamline our workflow and increase productivity across all departments.',
            'testimonial_title' => 'Outstanding service and results!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar1.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 2,
            'customer_name' => 'Jane Smith',
            'customer_position' => 'Marketing Director at Creative Solutions',
            'testimonial_text' => 'The platform is intuitive, easy to navigate, and the customer support is top-notch. I highly recommend it.',
            'testimonial_title' => 'Highly recommended for businesses!',
            'rating' => 4,
            'avatar_image' => 'path/to/avatar2.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 3,
            'customer_name' => 'Emily Johnson',
            'customer_position' => 'Project Manager at Innovate Tech',
            'testimonial_text' => 'Fantastic experience from start to finish. The service exceeded our expectations, and the results are remarkable.',
            'testimonial_title' => 'Exceeded expectations!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar3.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 4,
            'customer_name' => 'Michael Lee',
            'customer_position' => 'CTO at Web Solutions Inc.',
            'testimonial_text' => 'This platform has significantly improved our team\'s workflow and communication. A must-have for any growing business.',
            'testimonial_title' => 'Improved team collaboration!',
            'rating' => 4,
            'avatar_image' => 'path/to/avatar4.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 5,
            'customer_name' => 'Sarah Brown',
            'customer_position' => 'Customer Support Manager at TechGuru',
            'testimonial_text' => 'I have never seen such a responsive and efficient customer service tool. It has made our support team much more efficient.',
            'testimonial_title' => 'Incredible support tool!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar5.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 6,
            'customer_name' => 'David Kim',
            'customer_position' => 'Operations Manager at FinTech Innovations',
            'testimonial_text' => 'A great platform that has streamlined our operations, improved collaboration across teams, and boosted our overall efficiency.',
            'testimonial_title' => 'Streamlined our operations!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar6.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 7,
            'customer_name' => 'Linda Garcia',
            'customer_position' => 'HR Manager at Global Enterprises',
            'testimonial_text' => 'We saw an immediate improvement in employee satisfaction and engagement after implementing this tool. It’s been a game-changer for HR.',
            'testimonial_title' => 'Boosted employee engagement!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar7.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 8,
            'customer_name' => 'Robert White',
            'customer_position' => 'Lead Developer at CodeCrafters',
            'testimonial_text' => 'This service helped our development team meet tight deadlines with greater ease. A perfect fit for fast-paced teams.',
            'testimonial_title' => 'Perfect for fast-paced teams!',
            'rating' => 4,
            'avatar_image' => 'path/to/avatar8.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 9,
            'customer_name' => 'Patricia Wilson',
            'customer_position' => 'Operations Director at HealthTech',
            'testimonial_text' => 'The platform was a game-changer for our healthcare operation. The results were seen almost immediately after adoption.',
            'testimonial_title' => 'A game-changer for healthcare operations!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar9.jpg',
            'is_active' => true,
        ]);

        Testimonial::updateOrCreate([
            'id' => 10,
            'customer_name' => 'William Harris',
            'customer_position' => 'Founder at GreenTech Solutions',
            'testimonial_text' => 'Absolutely amazing! The platform has allowed us to optimize our processes and improve communication across departments.',
            'testimonial_title' => 'Optimized our processes!',
            'rating' => 5,
            'avatar_image' => 'path/to/avatar10.jpg',
            'is_active' => true,
        ]);
    }
}
