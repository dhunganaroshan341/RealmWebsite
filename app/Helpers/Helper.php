<?php

use App\Models\FeaturedService;
use App\Models\Setting;
use App\Models\Blog;

function getSettings(){
    return Setting::first();
}

function getServices(){
    return FeaturedService::leftJoin('services','services.id','featured_services.service_id')
    ->orderBy('sort_order','ASC')
    ->get();
}

function getLatestBlog(){
    $blogs = Blog::where('status',1)->orderBy('created_at','DESC')->take(6)->get();
    return $blogs;
}
function get_website_title(){
    $settings = getSettings();
    if($settings == null || $settings->website_title == null){
        return 'Realm Infotech';
    }
    return $settings->website_title;
}

function get_website_logo(){
    $settings = getSettings();
    if($settings == null || $settings->website_logo == null){
        return asset('assets/images/logo.png');
    }
    return asset('uploads/'.$settings->website_logo);
}

function get_services(){
    $services = getServices();
    return $services;
}

?>
