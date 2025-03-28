<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model {
    use HasFactory;

    protected $fillable = ['title', 'type', 'client_id'];

    // Relationship: An album has many media files
    public function media() {
        return $this->hasMany(GalleryMedia::class);
    }

    // Relationship: An album may belong to a client
    public function client() {
        return $this->hasMany(Client::class);
    }
}
