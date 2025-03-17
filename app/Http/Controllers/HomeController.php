<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index() {
        $services = Service::where('status',1)->orderBy('created_at','DESC')->paginate(6);
        $data['services'] = $services;        
        return view('home',$data);
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
