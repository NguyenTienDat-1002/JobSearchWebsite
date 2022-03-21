<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CV;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate();
        return view("search")->with(['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post');
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
        $validator = Validator::make($request->all(),[
            'position'=>['bail','required', 'string', 'max:255'],
            'level'=>['bail','required'],
            'salary'=>['bail','required'],
            'end'=>['bail','required','date'],
            'company'=>['bail','string','required'],
            'email'=>['bail','email','string'],
            'logo'=>['required','mimes:jpeg,jpg,png,gif'],
            'location'=>['bail','required','string'],
            'city'=>['required'],
            'industry'=>['required'],
            'description'=>['required'],
            'requirement'=>['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $post = Post::create([
            'email'=>$request->email,
            'position'=>$request->position,
            'salary'=>$request->salary,
            'end_date'=>$request->end,
            'company_name'=>$request->company,
            'location'=>$request->location,
            'employer_id'=>Auth::guard('employer')->id(),
            'industry_id'=>$request->industry,
            'level_id'=>$request->level,
            'city_id'=>$request->city,
        ]);

        Storage::disk('local')->put('description/'.$post->id.'.txt',$request->description);
        Storage::disk('local')->put('requirement/'.$post->id.'.txt',$request->requirement);   

        $post->update([
            'logo'=>$request->file('logo')->storeAs('logo', $post->id.'.'.$request->file('logo')->getClientOriginalExtension(), 'public'),
            'description'=>'description/'.$post->id.'.txt',
            'requirement'=>'requirement/'.$post->id.'.txt',
        ]);
        //$request->file('logo')->store('post1.jpg','public');
        //return asset('storage/post1.jpg');
        return redirect()->back()->with('notification','post successful');
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
        $post=Post::where('id',$id)->get()->first();
        $description=Storage::disk('local')->get($post->description);
        $requirement=Storage::disk('local')->get($post->requirement);
        return view('job')->with(['post'=>$post,
                                'description'=>str_replace("\n",'<br>',htmlentities($requirement)),
                                'requirement'=>str_replace("\n",'<br>',htmlentities($requirement)),]);
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
        $post=Post::withoutGlobalScopes()->where('id',$id)->first();

        if($post->employer_id!=Auth::guard('employer')->user()->id)
            abort(401);

        return view('postupdate')->with('post',$post);
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
        $validator = Validator::make($request->all(),[
            'position'=>['bail','required', 'string', 'max:255'],
            'level'=>['bail','required'],
            'salary'=>['bail','required'],
            'end'=>['bail','required','date'],
            'company'=>['bail','string','required'],
            'email'=>['bail','email','string'],
            'logo'=>['mimes:jpeg,jpg,png,gif'],
            'location'=>['bail','required','string'],
            'city'=>['required'],
            'industry'=>['required'],
            'description'=>['required'],
            'requirement'=>['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $post = Post::withoutGlobalScopes()->where('id',$id);

        $post->update([
            'email'=>$request->email,
            'position'=>$request->position,
            'salary'=>$request->salary,
            'end_date'=>$request->end,
            'company_name'=>$request->company,
            'location'=>$request->location,
            'employer_id'=>Auth::guard('employer')->id(),
            'industry_id'=>$request->industry,
            'level_id'=>$request->level,
            'city_id'=>$request->city,
        ]);

        Storage::disk('local')->put('description/'.$id.'.txt',$request->description);
        Storage::disk('local')->put('requirement/'.$id.'.txt',$request->requirement);  
        if($request->hasFile('logo')) 
            $request->file('logo')->storeAs('logo', $id.'.'.$request->file('logo')->getClientOriginalExtension(), 'public');
        //$request->file('logo')->store('post1.jpg','public');
        //return asset('storage/post1.jpg');
        return redirect()->back()->with('notification','update successful');
        
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
        $post=POST::withoutGlobalScopes()->where('id',$id)->get()->first();

        if($post->employer_id!=Auth::guard('employer')->user()->id)
            abort(401);

        Storage::disk('public')->delete($post->logo);
        Storage::disk('local')->delete([$post->requirement,$post->description,]);
        $CVs=CV::where('post_id',$post->id)->get();
        foreach($CVs as $CV){
            Storage::disk('public')->delete($CV->CV_URL);
            $CV->delete();
        }
        
        $post->delete();
        
        return redirect(route('employer.posts'));
    }

    public function search(Request $request){
        $posts=Post::where(function(Builder $query) use($request){
            return $query->where('position','like',"%{$request->search}%")
            ->orWhere('company_name','like',"%{$request->search}%");
        });
        if($request->city)
            $posts=$posts->where('city_id',$request->city);
        if($request->level)
            $posts=$posts->where('level_id',$request->level);
        $posts=$posts->paginate(15);
        return view('search')->with('posts',$posts);
    }

    public function find(Request $request){
        $posts=Post::where('city_id',$request->city);
        if($request->level)
            $posts=$posts->where('level_id',$request->level);
        $posts=$posts->paginate();
        return view('search')->with('posts',$posts);
    }

    public function employerPosts(Request $request){
        $posts=Post::withoutGlobalScopes()->where('employer_id',Auth::guard('employer')->id())->paginate();

        return view('employerPosts')->with('posts',$posts);
    }

    public function employerPost($id){
        $post=Post::withoutGlobalScopes()->where('id',$id)->get()->first();
        $description=Storage::disk('local')->get($post->description);
        $requirement=Storage::disk('local')->get($post->requirement);
        return view('postview')->with(['post'=>$post,
                                'description'=>str_replace("\n",'<br>',htmlentities($requirement)),
                                'requirement'=>str_replace("\n",'<br>',htmlentities($requirement)),]);
    }
}
