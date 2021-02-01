<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostEditLayout extends Component
{
    public string $method;
    public string $action;

    public function __construct($action = '/posts', $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.post-edit');
    }
}
