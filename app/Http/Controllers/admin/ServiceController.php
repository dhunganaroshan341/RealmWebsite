<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;

class ServiceController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }
    public function index(Request $request)
    {

        $services = Service::orderBy('created_at', 'DESC');
        // dd($services);
        if (!empty($request->keyword)) {
            $services = $services->where('name', 'like', '%' . $request->keyword . '%');
        }

        $services = $services->paginate(20);

        $data['services'] = $services;

        return view('admin.services.list', $data);
    }

    public function create()
    {
        return view('admin.services.create');
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


    public function save(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'short_description' => 'nullable|string',
                'status' => 'required|boolean',
                'image_id' => 'nullable|string',
            ]);

            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->short_desc = $request->short_description;
            $service->status = $request->status;
            $service->image = $request->image_id;
            $service->save();

            return response()->json(['status' => true, 'message' => "Service Created Successfully"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id, Request $request)
    {
        $service = Service::where('id', $id)->first();

        if (empty($service)) {
            session()->flash('error', 'Record not found in DB');
            return redirect()->route('serviceList');
        }

        $data['service'] = $service;

        return view('admin.services.edit', $data);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        // dd($request->all());

        if ($validator->passes()) {
            // Form validated successfully

            $service = Service::find($id);

            if (empty($service)) {
                session()->flash('error', 'Record not found');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $oldImageName = $service->image;

            if ($request->image_id) {
                if (File::exists($oldImageName)) {
                    File::delete($oldImageName);
                }
            }

            $service->update([
                'name' => $request->name,
                'description' => $request->description,
                'short_desc' => $request->short_description,
                'image' => $request->image_id,
            ]);

            // $service = new Service();
            // $service->name = $request->name;
            // $service->description = $request->description;
            // $service->short_desc = $request->short_description;
            // $service->status = $request->status;
            // $service->image = $request->image_id;
            // $service->save();

            return response()->json([
                'status' => true,
                'message' => 'Service Updated Successfully'
            ]);
        } else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete($id, Request $request)
    {

        try {
            $service = Service::find($id);

            if (empty($service)) {

                session()->flash('error', 'Record not found');

                return response([
                    'status' => 0
                ]);
            }

            if (File::exists($service->image)) {
                File::delete($service->image);
            }

            $service->delete();

            return response()->json(['status' => true, 'message' => "Service deleted Successfully."]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
