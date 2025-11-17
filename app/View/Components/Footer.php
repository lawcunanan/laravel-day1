<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $owner;
    
    public function __construct($owner = "Lawremnce S. Cunanan")
    {
        $this->owner = $owner;
    }

   
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
