<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxCustom extends Component
{
    public $checked;
    /**
     * Create a new component instance.
     */
    public function __construct($checked = false)
    {
        $this->checked = $checked;
        //
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox-custom');
    }
}
