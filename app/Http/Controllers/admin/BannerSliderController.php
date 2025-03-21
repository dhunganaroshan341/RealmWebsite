<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Image;
use App\Http\Controllers\Controller;
use App\Models\BannerSlider;

class BannerSliderController extends Controller
{
    public function index(Request $request)
    {
        $query = BannerSlider::query();

        if ($request->has('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        $bannerSliders = $query->paginate(10); // Ensure pagination

        return view('admin.banner-slider.list', compact('bannerSliders'));
    }


    public function create()
    {
        return view('admin.banner-slider.create');
    }public function edit($id)
    {
        $bannerSlider = BannerSlider::find($id);

        return view('admin.banner-slider.form',compact('bannerSlider'));
    }

    public function store(Request $request)
    {
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create BannerSlider with validated data
        $banner = BannerSlider::create($validator->validated());

        if ($request->has('temp_image')) {
            $tempFileName = $request->temp_image;
            $newFileName = Str::random(10) . '_' . $tempFileName;
            $sourcePath = public_path('uploads/temp/' . $tempFileName);
            $smallThumbPath = public_path('uploads/BannerSliders/thumb/small/' . $newFileName);

            if (File::exists($sourcePath)) {
                File::move($sourcePath, $smallThumbPath);
                $banner->image = $newFileName;
            }
        }

        $banner->save();

        return response()->json(['message' => 'Banner slider created successfully', 'data' => $banner]);
    }

    public function show($id)
    {
        $banner = BannerSlider::findOrFail($id);
        return response()->json($banner);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $banner = BannerSlider::findOrFail($id);
        $banner->update($validator->validated());

        if ($request->has('temp_image')) {
            $tempFileName = $request->temp_image;
            $newFileName = Str::random(10) . '_' . $tempFileName;
            $sourcePath = public_path('uploads/temp/' . $tempFileName);
            $smallThumbPath = public_path('uploads/BannerSliders/thumb/small/' . $newFileName);

            if (File::exists($sourcePath)) {
                // Delete old image if exists
                if (File::exists(public_path('uploads/BannerSliders/thumb/small/' . $banner->image))) {
                    File::delete(public_path('uploads/BannerSliders/thumb/small/' . $banner->image));
                }

                File::move($sourcePath, $smallThumbPath);
                $banner->image = $newFileName;
            }
        }

        $banner->save();

        return response()->json(['message' => 'Banner slider updated successfully', 'data' => $banner]);
    }

    public function destroy($id)
    {
        $banner = BannerSlider::findOrFail($id);

        if (File::exists(public_path('uploads/BannerSliders/thumb/small/' . $banner->image))) {
            File::delete(public_path('uploads/BannerSliders/thumb/small/' . $banner->image));
        }

        $banner->delete();
        return response()->json(['message' => 'Banner slider deleted successfully']);
    }

    public function validateData(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'button_text' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
        ]);
    }
}
