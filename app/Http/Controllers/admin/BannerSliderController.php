<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSlider;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;



use App\Traits\UploadImageWithThumbnail;

class BannerSliderController extends Controller
{
    protected $imageManager;


    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }


    public function index(Request $request) {
        //return view('admin.BannerSlider.list');

        $BannerSliders = BannerSlider::orderBy('created_at','DESC');

        if (!empty($request->keyword)) {
            $BannerSliders = $BannerSliders->where('name','like','%'.$request->keyword.'%');
        }

        $BannerSliders = $BannerSliders->paginate(20);

        $data['BannerSliders'] = $BannerSliders;

        return view('admin.BannerSlider.list',$data);
    }

    // This method will show create BannerSlider page
    public function create() {
        return view('admin.BannerSlider.create');
    }

    // This method will save a BannerSlider in DB


    public function save(Request $request)
    {
        $validator = Validator::read($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:BannerSliders'
        ]);

        if ($validator->passes()) {
            // Form validated successfully
            $BannerSlider = new BannerSlider;
            $BannerSlider->name = $request->name;
            $BannerSlider->description = $request->description;
            $BannerSlider->short_desc = $request->short_description;
            $BannerSlider->status = $request->status;
            $BannerSlider->save();

            // Check if image_id is provided
            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id', $request->image_id)->first();

                if ($tempImage) {
                    $tempFileName = $tempImage->name;
                    $imageArray = explode('.', $tempFileName);
                    $ext = end($imageArray);

                    $newFileName = 'BannerSlider-' . $BannerSlider->id . '.' . $ext;
                    $sourcePath = './uploads/temp/' . $tempFileName;

                    // Using the ImageUploadTrait to handle image and thumbnail creation
                    $paths = $this->uploadImageWithThumbnail(
                        $tempImage,
                        'BannerSliders', // Folder for original images
                        app(ImageManager::class), // Intervention Image Manager instance
                        360, // Small thumbnail width
                        220  // Small thumbnail height
                    );

                    // Save the image paths
                    $BannerSlider->image = $newFileName;
                    $BannerSlider->save();

                    // Clean up temporary file
                    File::delete($sourcePath);

                    // Flash success message
                    session()->flash('success', 'BannerSlider Created Successfully');

                    return response()->json([
                        'status' => 200,
                        'message' => 'BannerSlider Created Successfully'
                    ]);
                }
            }

        } else {
            // Return errors if validation fails
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }



    public function edit($id, Request $request)
    {
        // Find the BannerSlider by its ID
        $BannerSlider = BannerSlider::find($id);

        // Check if the record exists
        if (!$BannerSlider) {
            // Use the session flash to store an error message
            session()->flash('error', 'Record not found in DB');

            // Redirect to the list page if not found
            return redirect()->route('BannerSliderList');
        }

        // Pass the BannerSlider object to the view
        $data['BannerSlider'] = $BannerSlider;

        // Return the edit view with the data
        return view('admin.BannerSlider.edit', $data);
    }


    public function update($id, Request $request)
    {
        // Validate the input data
        $validator = Validator::read($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:BannerSliders,slug,' . $id, // Allow the current slug
        ]);

        // Check if validation passed
        if ($validator->passes()) {
            // Find the BannerSlider by ID
            $BannerSlider = BannerSlider::find($id);

            if (!$BannerSlider) {
                // If record not found, flash error message and return failure response
                session()->flash('error', 'Record not found');
                return response()->json([
                    'status' => 0,
                    'message' => 'Record not found',
                ]);
            }

            // Store the old image name for later deletion
            $oldImageName = $BannerSlider->image;

            // Update the BannerSlider attributes
            $BannerSlider->name = $request->name;
            $BannerSlider->description = $request->description;
            $BannerSlider->short_desc = $request->short_description;
            $BannerSlider->status = $request->status;
            $BannerSlider->slug = $request->slug;
            $BannerSlider->save(); // Save the updated record

            // Check if there's a new image to be uploaded
            if ($request->image_id > 0) {
                // Get the temporary image details
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray); // Get the file extension

                // Create a new file name
                $newFileName = 'BannerSlider-' . time() . '-' . $BannerSlider->id . '.' . $ext;

                // Path to the original image
                $sourcePath = './uploads/temp/' . $tempFileName;

                // Generate Small Thumbnail
                $smallThumbPath = './uploads/BannerSliders/thumb/small/' . $newFileName;
                $img = $this->imageManager->read($sourcePath);
                $img->cover(360, 220);
                $img->save($smallThumbPath);

                // Delete the old small thumbnail if it exists
                if (File::exists('./uploads/BannerSliders/thumb/small/' . $oldImageName)) {
                    File::delete('./uploads/BannerSliders/thumb/small/' . $oldImageName);
                }

                // Generate Large Thumbnail
                $largeThumbPath = './uploads/BannerSliders/thumb/large/' . $newFileName;
                $img = $this->imageManager->read($sourcePath);
                $img->resize(width:1150);
                $img->save($largeThumbPath);

                // Delete the old large thumbnail if it exists
                if (File::exists('./uploads/BannerSliders/thumb/large/' . $oldImageName)) {
                    File::delete('./uploads/BannerSliders/thumb/large/' . $oldImageName);
                }

                // Update the BannerSlider record with the new image
                $BannerSlider->image = $newFileName;
                $BannerSlider->save();

                // Delete the original temporary file after processing
                File::delete($sourcePath);
            }

            // Flash a success message
            session()->flash('success', 'BannerSlider updated successfully');

            // Return a success response
            return response()->json([
                'status' => 200,
                'message' => 'BannerSlider updated successfully',
            ]);
        } else {
            // Return validation errors if validation fails
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }



    public function delete($id, Request $request) {

        $BannerSlider = BannerSlider::where('id',$id)->first();

        if (empty($BannerSlider)) {

            session()->flash('error','Record not found');

            return response([
                'status' => 0
            ]);
        }

        $path = './uploads/BannerSliders/thumb/small/'.$BannerSlider->image;
        File::delete($path);

        $path = './uploads/BannerSliders/thumb/large/'.$BannerSlider->image;
        File::delete($path);

        BannerSlider::where('id',$id)->delete();

        session()->flash('success','BannerSlider deleted successfully.');

        return response([
            'status' => 1
        ]);

    }

    public function getSlug(Request $request){
        $slug = SlugService::createSlug(BannerSlider::class, 'slug', $request->name);
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    }
}
