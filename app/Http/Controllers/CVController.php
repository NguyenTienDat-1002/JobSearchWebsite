<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('apply')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator=Validator::make($request->all(),[
            'post'=>['bail','required','numeric'],
            'CV'=>['bail','required','mimes:pdf'],
        ]);
        if($validator->fails())
            return redirect()->back()->withErrors($validator);
        $cv= CV::create([
            'employee_id'=>Auth::guard('employee')->id(),
            'post_id'=>$request->post,
        ]);
        $cv->update([
            'CV_URL'=>Storage::disk('public')->putFileAs('CV',$request->file('CV'),$cv->id.'.pdf'),
        ]);

        return redirect()->back()->with('notification','apply successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listCV($id){
        $CVs=CV::where('post_id',$id)->paginate();
        if(Post::where('id',$id)->first()->employer_id!=Auth::guard('employer')->id())
            abort(401);
        return view('listCV')->with('CVs',$CVs);
    }
}
