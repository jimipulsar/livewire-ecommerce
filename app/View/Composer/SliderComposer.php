<?php

namespace App\View\Composer;

use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{

    protected $sliders;

    public function __construct()
    {
        $this->sliders = Slider::all();
    }

    public function compose(View $view) {
        $view->with('sliders', $this->sliders);
    }
}
