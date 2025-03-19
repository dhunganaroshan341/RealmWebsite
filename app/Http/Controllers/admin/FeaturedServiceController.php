<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FeaturedServiceController extends Controller
{
    protected $imageManager;

public function __construct()
{
    $this->imageManager = new ImageManager(new Driver());
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredServices = FeaturedService::with('service')->get();
        return view('admin.featured-services.index', compact('featuredServices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $email="test@gmail.com";
        // Mail::send('welcome', ['blog' => "Hello world"], function ($message) use ($email) {
        //     $message->to($email)->subject('THank you !');
        // });

        $request->validate
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FeaturedService::destroy($id);
        return response()->json(['message' => 'Service removed successfully']);
    }
}
