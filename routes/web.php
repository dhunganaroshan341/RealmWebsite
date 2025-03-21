<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BannerSliderController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedServiceController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// testing routes

Route::get('/test/login', function () {
    return view('components.register-login');
});

Route::get('/test/testimonials', function () {
    return view('components.testimonial');
});
// end of testing routes


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('static/{id}', function($id) {
    $page = Page::find($id); // Or use `where('id', $id)->first()` if you prefer
    if (!$page) {
        abort(404); // Page not found, handle gracefully
    }
    return view('static-page', ['page' => $page]); // Pass the page variable to the view
});

Route::get('/about-us',[ HomeController::class, 'about' ])->name('about');
Route::get('/terms',[ HomeController::class, 'terms' ])->name('terms');
Route::get('/privacy',[ HomeController::class, 'privacy' ])->name('privacy');
Route::get('/services',[ ServicesController::class, 'index' ]);
Route::get('/services/detail/{id}',[ ServicesController::class, 'detail' ]);


Route::get('/faq',[ FaqController::class, 'index' ]);
Route::get('/blog',[ BlogController::class, 'index' ])->name('blog.front');
Route::get('/blog/{id}',[ BlogController::class, 'detail' ])->name('blog-detail');
Route::get('/blog/{slug}',[ BlogController::class, 'detailBySlug' ])->name('blog-detail-by-slug');
Route::post('/save-comment',[ BlogController::class, 'saveComment' ])->name('save.blog');
Route::get('/contact',[ ContactController::class, 'index' ])->name('contact');
Route::post('/send-email',[ ContactController::class, 'sendEmail' ])->name('sendContactEmail');
Route::get('/gallery', function () {
    $page = [
        'title' => 'Gallery Page',
        'description' => 'This is the gallery page where you can view amazing pictures.'
    ];

    return view('gallery.index', compact('page'));
})->name('gallery.index');


Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){
        // here we will define guest route

        Route::get('/login',[AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/login',[AdminLoginController::class, 'authenticate'])->name('admin.auth');


    });

    Route::group(['middleware' => 'admin.auth'], function(){
        // here we will define password protected routes

        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

        Route::get('/services/create',[ServiceController::class,'create'])->name('service.create.form');

        Route::post('/services/create',[ServiceController::class,'save'])->name('service.create');

        Route::post('/temp/upload',[TempImageController::class,'upload'])->name('tempUpload');

        Route::get('/services',[ServiceController::class,'index'])->name('serviceList');

        Route::get('/services/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');

        Route::post('/services/edit/{id}',[ServiceController::class,'update'])->name('service.edit.update');

        Route::post('/services/delete/{id}',[ServiceController::class,'delete'])->name('service.delete');

        Route::get('featured-services', [FeaturedServiceController::class, 'index'])->name('featured-services.index');
        Route::post('featured-services', [FeaturedServiceController::class, 'store'])->name('featured-services.save');
        Route::delete('featured-services/{id}', [FeaturedServiceController::class, 'destroy'])->name('featured-services.destroy');
        // Blog Routes
        Route::get('/blog/create',[AdminBlogController::class,'create'])->name('blog.create.form');
        Route::post('/blog/create',[AdminBlogController::class,'save'])->name('blog.save');
        Route::get('/blog',[AdminBlogController::class,'index'])->name('blogList');
        Route::get('/blog/edit/{id}',[AdminBlogController::class,'edit'])->name('blog.edit');
        Route::post('/blog/edit/{id}',[AdminBlogController::class,'update'])->name('blog.update');
        Route::post('/blog/delete/{id}',[AdminBlogController::class,'delete'])->name('blog.delete');

        Route::get('/blog/get-slug',[AdminBlogController::class,'getSlug'])->name('blog.slug');

        // Faq Routes
        Route::get('/faq',[AdminFaqController::class,'index'])->name('faqList');
        Route::get('/faq/create',[AdminFaqController::class,'create'])->name('faq.create.form');
        Route::post('/faq/save',[AdminFaqController::class,'save'])->name('faq.save');
        Route::get('/faq/edit/{id}',[AdminFaqController::class,'edit'])->name('faq.edit');
        Route::post('/faq/edit/{id}',[AdminFaqController::class,'update'])->name('faq.update');
        Route::post('/faq/delete/{id}',[AdminFaqController::class,'delete'])->name('faq.delete');

        // Page Routes

        Route::get('/page/create',[PageController::class,'create'])->name('page.create.form');
        Route::post('/page/create',[PageController::class,'save'])->name('page.save');
        Route::get('/pages',[PageController::class,'index'])->name('pageList');
        Route::get('/page/edit/{id}',[PageController::class,'edit'])->name('page.edit');
        Route::post('/page/edit/{id}',[PageController::class,'update'])->name('page.update');
        Route::post('/page/delete/{id}',[PageController::class,'delete'])->name('page.delete');

        Route::post('/page/deleteImage',[PageController::class,'deleteImage'])->name('page.deleteImage');
// banner slider section
Route::resource('banner-sliders', BannerSliderController::class);
        // Setting Routes
        Route::get('/settings',[SettingsController::class,'index'])->name('settings.index');
        Route::post('/settings',[SettingsController::class,'save'])->name('settings.save');
    });
    // testimonial Adminpanel
    Route::apiResource('testimonials',TestimonialController::class);
    Route::get('testimonials/create',[Testimonialcontroller::class,'create'])->name('testimonials.create');
    Route::get('testimonials/edit/{testimonial}',[Testimonialcontroller::class,'edit'])->name('testimonials.edit');


    Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('galleries/{id}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('galleries/{id}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{id}', [GalleryController::class, 'destory'])->name('galleries.destroy');

});
