<?php

namespace App\View\Components;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontGallery extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $galleries = Gallery::with('images')->get();
        return view('components.front-gallery',compact('galleries'));
    }
}
