<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class jobCard extends Component
{
    public string $larajob;
    /**
     * Create a new component instance.
     */
    public function __construct($larajob)
    {
        $this->larajob = $larajob;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-card');
    }
}
