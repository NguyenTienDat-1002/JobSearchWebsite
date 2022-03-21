<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employee_Account;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Industry;

class EmployeeAccountController extends Controller
{
    public function index(){
        return;
    }
    public function Login(Request $request){
        $credentials = $request->only(['email','password']);

        if(Auth::guard('employee')->attempt($credentials)){
            return redirect(route('employee.home'));
        }else{
            return redirect()->back()->withErrors('email or password is incorrect');
        }
    }

    public function ShowLogin(){
        return view('login')->with('entity','employee');
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }

    public function create(){
        return view('register')->with('entity','employee');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'fname' => ['bail','required', 'string', 'max:255'],
            'lname' => ['bail','required', 'string', 'max:255'],
            'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:employee_account,email'],
            'phone' => ['bail','required','digits:10'],
            'password' => ['bail','required', 'string', 'min:8', 'max:32', 'regex:{^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$}', ],
            'rpassword'=> ['bail','required', 'string', 'min:8', 'max:32','same:password'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $account = Employee_Account::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $employee = Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'accountid' => $account->id,
        ]);
        return redirect()->back()->with('notification','register successful');
    }
}
