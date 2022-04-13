<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Listicons extends Component
{
        /**
     * The alert type.
     *
     * @var string
     */
    public $urlparam;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($urlparam)
    {
        $this->urlparam = $urlparam;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listicons');
    }
}
