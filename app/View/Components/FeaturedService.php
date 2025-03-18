<?php
namespace App\View\Components;

use App\Models\FeaturedService as ModelsFeaturedService;
use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedService extends Component
{
    /**
     * Create a new component instance.
     */
    protected $featuredServices;
    protected $allServices;
    public function __construct()
    {
        // Fetch featured services along with related service information
        $this->featuredServices = ModelsFeaturedService::with('service')->get();
        $this->allServices = Service::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-service', ['featuredServices' => $this->featuredServices,'allServices'=>$this->allServices]);
    }
}
