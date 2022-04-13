<?php

namespace App\View\Components;

use Illuminate\View\Component;

class circleprogressbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id="",$color="",$image="",$value="",$imgClass="",$progressPercent="",$progressTitle="";
    public function __construct($id,$color, $image,$value,$imgClass,$progressPercent,$progressTitle)
    {
        //
        $this->$id= $id;
        $this->$color= $color;
        $this->$image= $image;
        $this->$value=$value;
        $this->$imgClass=$imgClass;
        $this->$progressPercent=$progressPercent;
        $this->$progressTitle=$progressTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.circleprogressbar');
    }
}
