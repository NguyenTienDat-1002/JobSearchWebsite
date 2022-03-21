<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CV;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts=Post::take(9)->get();
        return view('home')->with(['entity'=>'admin','posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::guard('admin')->user()->role!=0)
            abort(401);
        return view('adminadd');
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
        if(Auth::guard('admin')->user()->role!=0)
            abort(401);
        $validator = Validator::make($request->all(),[
            'username' => ['bail','required', 'string', 'max:255', 'unique:admin,username'],
            'phone' => ['bail','required','digits:10'],
            'password' => ['bail','required', 'string', 'min:8', 'max:32', 'regex:{^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$}', ],
            'rpassword'=> ['bail','required', 'string', 'min:8', 'max:32','same:password'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $admin=Admin::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('admin.list'));
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
        if(Auth::guard('admin')->user()->role!=0)
            abort(401);
        $admin = Admin::where('id',$id)->where('role',1)->first();
        $admin->delete();
        return redirect()->back();
    }

    public function ShowLogin(Request $request){
        return view('adminlogin');
    }

    public function Login(Request $request){
        $credentials = $request->only(['username','password']);
        if(Auth::guard('admin')->attempt($credentials)){
            //return dd(Auth::guard('employer')->user()->getAttributes());
            return redirect(route('admin.home'));
        }else{
            return redirect()->back()->withErrors('username or password is incorrect');
        }
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }

    public function searchpost(Request $request){
        $posts=POST::withoutGlobalScopes()->where(function(Builder $query) use($request){
            return $query->where('position','like',"%{$request->search}%")
            ->orWhere('company_name','like',"%{$request->search}%");
        });
        if($request->city)
            $posts->where('city_id',$request->city);
        if($request->level)
            $posts->where('level_id',$request->level);
        if($request->status >=0 && $request->status<2 && $request->status!="")
            $posts->where('status',$request->status);
        $posts=$posts->paginate();
        return view('adminpostlist')->with('posts',$posts);
    }

    public function postDetail($id){
        $post=POST::withoutGlobalScopes()->where('id',$id)->get()->first();
        $description=Storage::disk('local')->get($post->description);
        $requirement=Storage::disk('local')->get($post->requirement);
        return view('adminpostview')->with(['post'=>$post,
                                'description'=>str_replace("\n",'<br>',htmlentities($requirement)),
                                'requirement'=>str_replace("\n",'<br>',htmlentities($requirement)),]);
    }

    public function Check($id){
        $post=POST::withoutGlobalScopes()->where('id',$id)->first();
        $post->update([
            'status'=>1,
        ]);
        return redirect()->back();
    }

    public function postDelete($id){
        $post=POST::withoutGlobalScopes()->where('id',$id)->get()->first();
        Storage::disk('public')->delete($post->logo);
        Storage::disk('local')->delete([$post->requirement,$post->description,]);
        $CVs=CV::where('post_id',$post->id)->get();
        foreach($CVs as $CV){
            Storage::disk('public')->delete($CV->CV_URL);
            $CV->delete();
        }
        
        $post->delete();
        return redirect(route('admin.home'));
    }

    public function ListAdmin(){
        if(Auth::guard('admin')->user()->role!=0)
            abort(401);
        $admins=Admin::where('role','<>',0)->get();
        return view('listadmin')->with('admins',$admins);
    }
    
    public function defaultadmin(){

        $account = Admin::create([
            'username' => 'superadmin',
            'password' =>Hash::make('12345678'),
            'role' => 0,
        ]);
        return 'sucessful';
    } 

}
