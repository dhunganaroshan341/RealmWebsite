<?php
namespace App\Traits;

use Intervention\Image\ImageManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadImageWithThumbnail
{
    /**
     * Handles image upload and thumbnail generation.
     *
     * @param UploadedFile $file The uploaded file.
     * @param string $folder The folder where the original image will be stored.
     * @param ImageManager $manager The Intervention Image Manager.
     * @param int $thumbWidth Width of the thumbnail.
     * @param int $thumbHeight Height of the thumbnail.
     * @return array Returns an array containing paths for the original and thumbnail images.
     */
    public function uploadImageWithThumbnail(
        UploadedFile $file,
        string $folder,
        ImageManager $manager,
        int $thumbWidth = 300,
        int $thumbHeight = 300
    ): array {
        // Generate unique filename
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Define paths
        $originalPath = "uploads/{$folder}/" . $filename;
        $thumbnailPath = "thumbnails/" . $filename;

        // Save Original Image
        Storage::disk('public')->put($originalPath, file_get_contents($file));

        // Generate and Save Thumbnail
        $image = $manager->read($file);
        $image->scale(width: $thumbWidth, height: $thumbHeight)
              ->save(public_path("storage/" . $thumbnailPath));

        return [
            'original'  => $originalPath,
            'thumbnail' => $thumbnailPath
        ];
    }
}
