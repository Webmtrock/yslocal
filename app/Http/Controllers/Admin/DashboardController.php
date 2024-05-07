<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\WibinerUser;
use App\Models\Program;

class DashboardController extends Controller
{
   
    public function index()
    {
       
        $expert = Expert::latest()->take(10)->get();
        $webinarUsersCount = WibinerUser::count();
        $activeProgramCount = Program::count(); 
        return view('admin.dashboard', compact('expert','webinarUsersCount','activeProgramCount'));
    }
 
     

}