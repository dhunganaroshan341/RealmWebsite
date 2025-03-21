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
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create new gallery
        $gallery = Gallery::create([
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

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully!');
    }

    // Show all galleries


    // Show gallery edit form
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
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
