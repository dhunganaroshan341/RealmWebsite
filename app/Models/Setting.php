<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $fillable = [
        'logo',
        'favicon',
        'website_title',
        'site_description',
        'site_keywords',
        'email',
        'phone',
        'site_address',
        'site_footer_text',
        'contact_card_one',
        'contact_card_two',
        'contact_card_three',
        'copy',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'cta_title',
        'cta_description',
        'cta_image',
        'cta_link',
        'home-welcome_section',
    ];
}
