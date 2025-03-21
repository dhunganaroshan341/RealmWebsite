<?php
// app/View/Components/StartingBanner.php

namespace App\View\Components;

use Illuminate\View\Component;

class StartingBanner extends Component
{
    public $title;
    public $description;

    // Constructor to accept the data passed from the view
    public function __construct($title = 'Default Title', $description = 'Default Description')
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.starting-banner');
    }
}
