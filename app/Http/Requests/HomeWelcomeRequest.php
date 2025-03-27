<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeWelcomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to false if authentication is required
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'home_welcome_content' => ['required', 'array'], // Must be an array
            'home_welcome_content.title' => ['required', 'string', 'max:255'],
            'home_welcome_content.subtitle' => ['nullable', 'string', 'max:255'], // Optional
            'home_welcome_content.description' => ['required', 'string', 'max:2000'], // Required (200 words)
            'home_welcome_content.image' => ['required', 'string', 'max:500'], // Required (Image path as string)
        ];
    }

    /**
     * Custom error messages
     */
    public function messages(): array
    {
        return [
            'home_welcome_content.required' => 'The home welcome section is required.',
            'home_welcome_content.title.required' => 'The title is required.',
            'home_welcome_content.title.max' => 'The title cannot exceed 255 characters.',
            'home_welcome_content.description.required' => 'The description is required.',
            'home_welcome_content.description.max' => 'The description cannot exceed 2000 characters.',
            'home_welcome_content.image.required' => 'An image path is required.',
        ];
    }
}
