<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminMasterLayout extends Component
{
    public $meta;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($meta = null)
    {
        $this->meta = $meta;
    }

    
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.admin-master');
    }
}
