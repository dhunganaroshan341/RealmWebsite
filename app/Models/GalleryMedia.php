<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryMedia extends Model {
    use HasFactory;

    protected $fillable = ['gallery_album_id', 'file_paths'];

    protected $casts = [
        'file_paths' => 'array', // Automatically converts JSON to array
    ];

    // Relationship: Each media entry belongs to one album
    public function album() {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }
}
