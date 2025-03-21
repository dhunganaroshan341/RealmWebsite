<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;  // Custom request validation

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // You can fetch testimonials here and return them
        $testimonials = Testimonial::all();
      return view('admin.testimonials.index',compact('testimonials'));
    }

    public function create(){
        return view('admin.testimonials.create');
    } public function edit($id)
    {
        try {
            // Find the testimonial by ID
            $testimonial = Testimonial::find($id);

            // Check if testimonial exists
            if (!$testimonial) {
                return redirect()->back()->with('error', 'Testimonial not found.');
            }

            // Pass the testimonial to the edit view
            return view('admin.testimonials.edit', compact('testimonial'));

        } catch (\Exception $e) {
            // Return error message in case of an exception
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        // Use validated data directly from the custom request class
        $testimonial = Testimonial::create($request->validated());

        return response()->json([
            'message' => 'Testimonial created successfully',
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show specific testimonial
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json([
                'message' => 'Testimonial not found'
            ], 404);
        }

        return response()->json($testimonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, string $id)
    {
        // Find testimonial and update it
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json([
                'message' => 'Testimonial not found'
            ], 404);
        }

        // Update testimonial with validated data
        $testimonial->update($request->validated());

        return response()->json([
            'message' => 'Testimonial updated successfully',
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the testimonial
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json([
                'message' => 'Testimonial not found'
            ], 404);
        }

        $testimonial->delete();

        return response()->json([
            'message' => 'Testimonial deleted successfully'
        ]);
    }
}
