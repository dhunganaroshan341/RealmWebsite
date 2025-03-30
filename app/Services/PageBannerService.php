<?php
namespace App\Services;

use App\Models\PageBanner;

class PageBannerService{
    public static function UpdateBanner($page,$image){
       try {

        $pageBanner = PageBanner::where('name',$page)->first();
       $updated =  $pageBanner->updateOrCreate(['image'=>$image]);
        return $updated;
       } catch (\Throwable $th) {
        //throw $th;
        return $th->getMessage();
       }

    }
    public function updateOrCreate($page,$Request){

    }
    public function index(){
        return response()->json([PageBanner::all(),'success']);
    }
}
