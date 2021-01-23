<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class File extends Component
{
    public $name;
    public $label;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = 'Upload File', $color = "indigo")
    {
        $this->name =$name;
        $this->label =$label;
        $this->color =$color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.file');
    }
}
