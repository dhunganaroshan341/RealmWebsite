<?php

namespace Database\Seeders;

use App\Models\BannerSlider;
use Illuminate\Database\Seeder;

class BannerSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carouselItems = [
            [
                'image' => 'assets/images/banner.jpg',
                'title' => 'If you love life, don’t waste time, for time is what life is made up of',
                'subtitle' => 'Bruce Lee',
                'description' => 'A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit.',
                'button_text' => 'Contact Now',
                'link' => 'appoinment.html'
            ],
            [
                'image' => 'assets/images/banner1.jpg',
                'title' => 'The two most powerful warriors are patience and time.',
                'subtitle' => 'Leo Tolstoy, War and Peace',
                'description' => 'A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit.',
                'button_text' => 'Contact Now',
                'link' => 'appoinment.html'
            ],
            [
                'image' => 'assets/images/banner24.jpg',
                'title' => 'The key is in not spending time, but in investing it.',
                'subtitle' => 'Stephen R. Covey',
                'description' => 'A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit.',
                'button_text' => 'Contact Now',
                'link' => 'appoinment.html'
            ],
        ];

        foreach ($carouselItems as $item) {
            BannerSlider::updateOrCreate(
                [
                    'image' => $item['image'],
                    'title' => $item['title']
                ],
                [
                    'subtitle' => $item['subtitle'] ?? null,
                    'description' => $item['description'] ?? null,
                    'button_text' => $item['button_text'] ?? null,
                    'link' => $item['link'] ?? null
                ]
            );
        }
    }
}
