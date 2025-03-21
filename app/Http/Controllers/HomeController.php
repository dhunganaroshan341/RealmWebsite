<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    protected $showPopup = false;
   public function show_popup(Request $request){
        // Check if this is the user's first visit using session
        if (!$request->session()->has('visited')) {
           // Set the session flag so the popup is shown only once
           $request->session()->put('visited', true);
           $this->showPopup = true;
       }
   }
    public function index(Request $request) {
        // showing popups
       $this->show_popup($request);
        $showPopup = $this->showPopup;

        $services = Service::where('status',1)->orderBy('created_at','DESC')->paginate(6);
        $data['services'] = $services;
        return view('home', compact('data', 'showPopup','services'));

    }

    public function about() {
        $page = Page::where('id',12)->first();
        return view('static-page',['page' => $page]);
    }

    public function privacy() {
        $page = Page::where('id',16)->first();
        return view('static-page',['page' => $page]);
    }

    public function terms() {
        $page = Page::where('id',14)->first();
        return view('static-page',['page' => $page]);
    }
}
