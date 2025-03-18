<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Change this to true if you want to allow all users
        // to make this request, or implement proper authorization logic.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => 'nullable|exists:services,id', // If service is predefined
            'custom_service_name' => 'nullable|string', // If service is custom
            'client_id' => 'nullable|exists:clients,id', // If client is predefined
            'custom_client_name' => 'nullable|string', // If client is custom
            'content' => 'required|array', // Content can include URL, image, etc.
            'content.url' => 'nullable|url', // If content is a URL
            'content.image' => 'nullable|image', // If content is an image
            'content.video' => 'nullable|url', // If content is a video (can be a URL to a video)
            'is_active' => 'nullable|boolean',
        ];
    }
}
