<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $options;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = null, $placeholder = null, array $options = [], $color = 'indigo')
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
