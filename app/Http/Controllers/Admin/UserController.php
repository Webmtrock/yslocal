<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   
  
    public function index()
    { 
        $user = User::where('otp_verified','1')->first();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {  
        //$data['roles'] = Role::all()->pluck('name', 'id');
        $data['roles'] = Role::all()->pluck('name', 'id');
        return view('admin.users.create', $data);
        
    }



    public function edit($id)
    {   
        
    // $data = User::findOrFail($id);
        $data['data'] = User::where('id', $id)->first();
        $data['roles'] = Role::all()->pluck('name', 'id');
        return view('admin.users.create',$data);
    }

public function store(Request $request)
{  
    //  $request->validate([
    //     'name' => 'required',
    //    // 'email' => 'required|email|max:255|unique:users,email',
    //     'email' => 'nullable|email|unique:users,email,' . $request->id,
    //     'profileImage' => 'nullable | mimes:jpeg,png,jpg',
    //     'phone' => 'required'. $request->id,
    //     'role' =>'required'. $request->id,
    //     'status' =>'required'
    // ]);

    $imagePath = config('app.profile_image');
    $data = User::updateOrCreate(
        [
            'id' => $request->id,
        ],
        [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_image' => $request->hasfile('profileImage') ? Helper::storeImage($request->file('profileImage'), $imagePath, $request->profileImageOld) : (isset($request->profileImageOld) ? $request->profileImageOld : ''),
            'status' =>$request->status,
            
        ]
    );
    $user = $data->roles()->sync($request->role);
    if ($data) {
        return redirect()->route('users.index')->with('success', 'created successfully.');

    } else {
        return redirect()->back()->with('error', 'Something went wrong, please try again.');
    }
}

public function update(Request $request, $id)
{
    return $this->saveUser($request, $id);
}


public function delete($id)
{    
   
    $user = User::findOrFail($id);
    
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User Deleted successfully');
}

public function show($id)
{
    
    $data['data'] = User::where('id',$id)->first();
    //dd($data['data'] );
    if(!$data['data']) {
        return redirect()->back()->with('error', 'Invalid User');
    }
    return view('admin.users.show',$data);
}

}
