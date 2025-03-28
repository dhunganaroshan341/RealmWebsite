<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }
    public function uploadImage(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('uploads/services/thumb/small');
            $file->move($destinationPath, $filename);

            return response()->json([
                'success' => true,
                'image_path' => 'uploads/services/thumb/small/' . $filename,
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function index()
{
    // Fetch settings, ensuring it's never null
    $settings = Setting::find(1) ?? new Setting();

    // Fetch services ordered by name
    $services = Service::orderBy('name', 'asc')->get();

    // Fetch featured services with left join to get service names
    $featuredServices = FeaturedService::select('services.name', 'featured_services.*')
        ->leftJoin('services', 'services.id', '=', 'featured_services.service_id')
        ->orderBy('sort_order', 'ASC')
        ->get();

    // Decode home_welcome_content safely (fallback to empty array if null)
    $home_welcome_content = json_decode($settings->home_welcome_content ?? '{}', true) ?? [];

    return view('admin.settings', [
        'settings' => $settings,
        'services' => $services,
        'homeWelcomeContent' => $home_welcome_content,
        'featuredServices' => $featuredServices
    ]);
}


    public function save(Request $request)
    {
        dd($request->all());
       try {
        //code...
        $validator = Validator::make($request->all(), [
            'website_title' => 'required',
            'home_welcome_content.title' => 'required|string|max:255',
            'home_welcome_content.subtitle' => 'nullable|string|max:255',
            'home_welcome_content.description' => 'required|string|max:2000',
            'home_welcome_content.image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }

        parse_str($request->services, $serviceArray);

        if (!empty($serviceArray['service'])) {
            FeaturedService::truncate();
            foreach ($serviceArray['service'] as $key => $service) {
                FeaturedService::create([
                    'service_id' => $service,
                    'sort_order' => $key
                ]);
            }
        }

        $settings = Setting::find(1) ?? new Setting;

        // Save basic settings
        $settings->website_title = $request->website_title;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->facebook_url = $request->facebook_url;
        $settings->twitter_url = $request->twitter_url;
        $settings->instagram_url = $request->instagram_url;
        $settings->contact_card_one = $request->contact_card_one;
        $settings->contact_card_two = $request->contact_card_two;
        $settings->contact_card_three = $request->contact_card_three;
        $settings->copy = $request->copy;

        // Handle Home Welcome Content
        $homeWelcomeContent = [
            'title' => $request->input('home_welcome_content.title'),
            'subtitle' => $request->input('home_welcome_content.subtitle'),
            'description' => $request->input('home_welcome_content.description'),
            'image' => $settings->home_welcome_content['image'] ?? null, // Preserve old image if not updated
        ];

        if ($request->hasFile('home_welcome_content.image')) {
            $image = $request->file('home_welcome_content.image');
            $imagePath = $image->store('uploads/home_welcome', 'public'); // Store image in storage/app/public/uploads/home_welcome
            $homeWelcomeContent['image'] = $imagePath;
        }

        $settings->home_welcome_content = json_encode($homeWelcomeContent);
        $settings->save();

        session()->flash('success', 'Settings saved successfully');

        return response()->json([
            'status' => 200,
            'message' => 'Settings updated successfully'
        ]);
       } catch (\Throwable $th) {
        //throw $th;
        session()->flash('Error:', ' An error occurred while saving settings\n'.$th->getMessage());
        return response()->json([
            'status' => 500,
            'message' => 'An error occurred while saving settings\n'.$th->getMessage()
        ]);

       }
    }
}
