<?php
// app/Http/Controllers/GalleryController.php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\GalleryMedia;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class   GalleryController extends Controller
{
    // Show gallery form
    public function index(){
        $clients = Client::all();
        $galleries = GalleryAlbum::with('media')->get();
        return view('admin.gallery.list',compact('galleries','clients'));
    }
    public function create()
    {
        return view('admin.galleries.create');
    }

    // Store new gallery with images
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:image,video,pdf', // Define the media type
            'images' => 'required|array', // This is now an array of files
            'images.*' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,pdf|max:2048',
        ]);

        // Create or find the album
        $gallery = $request->gallery_album_id
            ? GalleryAlbum::findOrFail($request->gallery_album_id)
            : GalleryAlbum::create([
                'title' => $request->title,
                'type' => $request->type, // Set the album type (image/video/pdf)
                'client_id' => $request->client_id ?? null,
            ]);

        // Store files and link them to the album
        foreach ($request->file('images') as $file) {
            $filePath = $file->store('public/gallery_files'); // Save the file and store its path

            // Save media to the database (store file paths)
            GalleryMedia::create([
                'gallery_album_id' => $gallery->id,
                'file_paths' => $filePath, // Save the path of the file
            ]);
        }

        session()->flash('success', 'Gallery created successfully!');

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
        $galleries = GalleryAlbum::findOrFail($id);
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
        $gallery = GalleryAlbum::findOrFail($id);
        $gallery->update([
            'title' => $request->title,
        ]);

        // Store images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/gallery_images');

                // Save image to database
                GalleryMedia::create([
                    'gallery_album_id' => $gallery->id,
                    'file_paths' => $path,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully!');
    }
}
