<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryAlbum;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class GalleryAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $galleries,$clients;

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads/gallery/thumb/large');
                $file->move($destinationPath, $filename);

                $imagePaths[] = 'uploads/gallery/thumb/large/' . $filename;
            }
        }

        return response()->json([
            'success' => true,
            'image_path' => $imagePaths, // Return all uploaded file paths
        ]);
    }

    public function __construct()
    {
        $this->galleries = GalleryAlbum::with('media')->get();
        $this->clients = Client::all();

    }
    public function index()
    {

        $albums = GalleryAlbum::latest()->paginate(10);
        return view('admin.gallery.list', [
            'albums' => $albums,
            'galleries' => $this->galleries,
            'clients' => $this->clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('admin.gallery.list', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,pdf,other',
            'client_id' => 'nullable|exists:clients,id',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,pdf|max:20480',
        ]);

        $data = $request->only(['title', 'type', 'client_id']);

        // Handle file upload
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('gallery-albums', 'public');
        }

        GalleryAlbum::create($data);

        return redirect()->route('galleries.index')->with('success', 'Gallery album created successfully.')->with(['galleries'=>$this->galleries,'clients'=>$this->clients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryAlbum $galleryAlbum)
    {
        return view('admin.gallery-albums.show', compact('galleryAlbum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryAlbum $galleryAlbum)
    {
        $clients = Client::all();

        return view('admin.gallery.list', compact('galleryAlbum', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryAlbum $galleryAlbum)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,pdf,other',
            'client_id' => 'nullable|exists:clients,id',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,pdf|max:20480',
        ]);

        $data = $request->only(['title', 'type', 'client_id']);

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($galleryAlbum->file_path) {
                Storage::disk('public')->delete($galleryAlbum->file_path);
            }
            $data['file_path'] = $request->file('file')->store('gallery-albums', 'public');
        }

        $galleryAlbum->update($data);

        return redirect()->route('gallery-albums.index')->with('success', 'Gallery album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryAlbum $galleryAlbum)
    {
        if ($galleryAlbum->file_path) {
            Storage::disk('public')->delete($galleryAlbum->file_path);
        }

        $galleryAlbum->delete();

        return redirect()->route('gallery-albums.index')->with('success', 'Gallery album deleted successfully.');
    }
}
