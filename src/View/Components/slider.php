<?php

namespace MrShaneBarron\slider\View\Components;

use Illuminate\View\Component;

class slider extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-slider::components.slider');
    }
}
