<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DashboardController extends Controller
{
    protected $imageManager;

public function __construct()
{
    $this->imageManager = new ImageManager(new Driver());
}
    public function index() {
        return view('admin.dashboard');
    }
}
