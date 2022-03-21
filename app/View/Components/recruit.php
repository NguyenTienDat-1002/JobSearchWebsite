<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Industry;
use App\Models\City;
use App\Models\Level;

class recruit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $Industries;
    public $Cities;
    public $Levels;
    public function __construct()
    {
        //
        $this->Industries=Industry::all();
        $this->Cities=City::all();
        $this->Levels=Level::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recruit');
    }
}
