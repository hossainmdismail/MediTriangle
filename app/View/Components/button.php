<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class button extends Component
{
    public $type;
    public $add;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $add = '')
    {
        $this->type = $type;
        $this->add = $add;

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
