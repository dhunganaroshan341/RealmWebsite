<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver; // Use GD Driver

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(ImageManager::class, function ($app) {
            // Use the string 'gd' or 'imagick' as the driver
            return new ImageManager('gd');  // or 'imagick'
        });}
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // this is defined in composer.json require_once app_path('Helpers/helpers.php');
    }
}
