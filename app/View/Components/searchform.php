<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\City;
use App\Models\Level;

class searchform extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $levels;
    public $cities;
    public $routename;

    public function __construct($routename)
    {
        //
        $this->levels=Level::all();
        $this->cities=City::all();
        $this->routename=$routename;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.searchform');
    }
}
