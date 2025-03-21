<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Define which attributes are mass assignable
    protected $fillable = [
        'customer_name',
        'customer_position',
        'testimonial_text',
        'testimonial_title',

        'rating',
        'avatar_image',
        'is_active',
    ];
}
