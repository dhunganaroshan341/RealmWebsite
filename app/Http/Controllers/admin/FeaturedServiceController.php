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
        $validatedData = $request->validate([
            'services' => 'required|array',
            'services.*.service_id' => 'required|exists:services,id',
            'services.*.sort_order' => 'nullable|integer',
        ]);

        try {
            foreach ($validatedData['services'] as $serviceData) {
                FeaturedService::create([
                    'service_id' => $serviceData['service_id'],
                    'sort_order' => $serviceData['sort_order'] ?? null,
                ]);
            }

            session()->flash('success', 'Services added successfully');
            return response()->json(['message' => 'Services added successfully']);
        } catch (\Exception $e) {
            session()->flash('error', 'Error Occurred: ' . $e->getMessage());
            return response()->json(['message' => 'Error Occurred: ' . $e->getMessage()]);
        }
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
