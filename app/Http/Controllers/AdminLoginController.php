<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expert;
use Auth;  

class AdminLoginController extends Controller
{   
   
    public function index()
    {
        return view('admin.login');
    }
    public function registerindex()
    {
        return view('admin.register');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
           
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to the dashboard!');
        } else {
            
            return back()->withErrors(['email' => 'Invalid credentials']); 
        }

    }
    public function store(Request $request)
    {  
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|min:10',

        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();
        return redirect()->route('admin/register')->with('success', 'User registered successfully.');
       
    }

    public function dashboard(Request $request)
    {    
       
        //return "WelCome to Dashboard ";
       return view('admin.dashboard');
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('admin/login');
    }


    public function expertLogin()
    {
        
        return view('admin.expert_login');
    }


    public function expertLoginSubmit(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
           
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to the dashboard!');
        } else {
            
            return back()->withErrors(['email' => 'Invalid credentials']); 
        }

    }
}