<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Industry;
class nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $Industries;
    public $entity;
    public function __construct($entity)
    {
        //
        $this->Industries= Industry::all();
        $this->entity=$entity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
