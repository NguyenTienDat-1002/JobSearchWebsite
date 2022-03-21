<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminpostdetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $requirement;
    public $description;

    public function __construct($post,$requirement,$description)
    {
        //
        $this->post=$post;
        $this->requirement=$requirement;
        $this->description=$description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adminpostdetail');
    }
}
