<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Industry;
use App\Models\City;
use App\Models\Level;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class postupdate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $Industries;
    public $Cities;
    public $Levels;
    public $description;
    public $requirement;

    public function __construct($post)
    {
        //
        $this->post=$post;
        $this->Industries=Industry::all();
        $this->Cities=City::all();
        $this->Levels=Level::all();
        $this->description=Storage::disk('local')->get($post->description);
        $this->requirement=Storage::disk('local')->get($post->requirement);
        //$this->description=str_replace("\n",'<br>',htmlentities(Storage::disk('local')->get($post->description)));
        //$this->requirement=str_replace("\n",'<br>',htmlentities(Storage::disk('local')->get($post->requirement)));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.postupdate');
    }
}
