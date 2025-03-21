<?php
namespace App\View\Components;

use App\Models\Testimonial as ModelsTestimonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonial extends Component
{
    /**
     * The testimonials data to be passed to the component.
     */
    protected $testimonials;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Retrieve all testimonials from the database
        $this->testimonials = ModelsTestimonial::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Return the view and pass testimonials data to it
        return view('components.testimonial', ['testimonials' => $this->testimonials]);
    }
}
