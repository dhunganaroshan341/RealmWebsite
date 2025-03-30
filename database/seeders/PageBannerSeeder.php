<?php

namespace Database\Seeders;

use App\Models\PageBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pageBanners = [
            'home','gallery','blog','contact','about'

        ];
        foreach($pageBanners as $banner){
            PageBanner::updateOrCreate(['name'=>$banner]);
        }
    }
}
