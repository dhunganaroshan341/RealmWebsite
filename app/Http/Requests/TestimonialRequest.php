<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // You can add authorization logic here if needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_position' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'testimonial_title' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'avatar_image' => 'nullable|string|max:255',  // You can customize this if you want to handle file uploads
            'is_active' => 'required|boolean',
        ];
    }
}
