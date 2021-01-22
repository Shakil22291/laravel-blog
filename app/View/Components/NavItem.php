<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $href;
    public $isActive;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = "#", $isActive = false)
    {
        $this->href = $href;
        $this->isActive = $isActive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.nav-item');
    }
}
