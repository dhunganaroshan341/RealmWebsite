<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\GalleryMedia;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the uploads/gallery directory exists
        $galleryDirectory = 'uploads/gallery/';
        if (!Storage::exists($galleryDirectory)) {
            Storage::makeDirectory($galleryDirectory);
        }

        $galleries = ['cg', 'realm', 'hinwa', 'aitm', 'medhisa'];

        foreach ($galleries as $galleryTitle) {
            $gallery = GalleryAlbum::create(['title' => $galleryTitle,'type'=>'image']);

            // Generate 5 random image paths
            $images = [];
            for ($i = 1; $i <= 5; $i++) {
                $imagePath ="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d71.png";
                $images[] = $imagePath;

                // Save each image in the images table
                GalleryMedia::create([
                    'gallery_album_id' => $gallery->id,
                    'file_path' => $imagePath,
                ]);
            }
        }
    }
}
