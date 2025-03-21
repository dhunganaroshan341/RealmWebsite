<?php
// app/Models/Image.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'image_path'];

    // Relationship with Gallery
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
