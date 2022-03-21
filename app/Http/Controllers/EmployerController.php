<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class EmployerController extends Controller
{
    //
    public function index(){
        $posts=Post::take(9)->get();
        return view('home')->with(['entity'=>'employer','posts'=>$posts]);
    }

}
