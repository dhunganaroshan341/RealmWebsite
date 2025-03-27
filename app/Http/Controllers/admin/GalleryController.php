<?php
// app/Http/Controllers/GalleryController.php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Show gallery form
    public function index(){
        $galleries = Gallery::with('images')->get();
        return view('admin.gallery.list',compact('galleries'));
    }
    public function create()
    {
        return view('admin.galleries.create');
    }

    // Store new gallery with images
    public function store(Request $request)
{
    $gallery = $request->gallery_id
        ? Gallery::findOrFail($request->gallery_id)
        : Gallery::create(['title' => $request->title]);

    $images = json_decode($request->images, true);
    foreach ($images as $image) {
        Image::create(['gallery_id' => $gallery->id, 'image_path' => $image]);
    }
    session()->push('sucess', 'gallery Image uploaded successfully!');

    return response()->json(['message' => 'Gallery saved successfully!']);
}

public function tempUpload(Request $request)
{
    $file = $request->file('file');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/temp'), $filename);
    session()->push('sucess', 'Image uploaded successfully!');
    return response()->json(['name' => $filename]);
}


    // Show all galleries


    // Show gallery edit form
    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        return view('admin.gallery.form', compact('galleries'));
    }

    // Update gallery with images
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update gallery
        $gallery = Gallery::findOrFail($id);
        $gallery->update([
            'title' => $request->title,
        ]);

        // Store images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/gallery_images');

                // Save image to database
                Image::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully!');
    }
}
