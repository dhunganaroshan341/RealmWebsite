<?php

use App\Models\BannerSlider;
use App\Models\FeaturedService;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\Service;
use App\Services\PageBannerService;

function getSettings(){
    return Setting::first();
}
function getBanners()
{
    $carouselItems = BannerSlider::all();

    return $carouselItems;
}


function getServices()
{
    // return  null;
    return FeaturedService::with('service')->get()->pluck('service');
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
   $services = Service::all();
   return $services;
}




// some shortcuts for controller
// response with json and session flash
function response_with_session_and_json($message,$type){
    session()->flash($type, $message);
    return response()->json(['message' => $message]);
}
function get_galleries() {
    return GalleryAlbum::with('media')->get();
}

function get_cta(){
    $cta_title = Setting::first()->pluck('cta_title');
    $cta_image = Setting::first()->pluck('cta_image');
    $cta_link = Setting::first()->pluck('cta_link');
    $cta_description = Setting::first()->pluck('cta_description');
    $cta = [
        'title'=>$cta_title,
        'description'=>$cta_description,
        'cta_link'=>$cta_link,
        'cta_image'=>$cta_image,
    ];
    return $cta;

}


// updating page banner
function update_page_banner($page,$image){
    $result = PageBannerService::UpdateBanner($page,$image);
    return $result;

}


?>
