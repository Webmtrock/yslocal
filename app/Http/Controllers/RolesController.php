<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $data['data'] = Role::where('name','!=','Admin')->get();
        return view('admin.roles.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['permissions'] = Permission::all()->pluck('title', 'id');

        return view('admin.roles.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //return  $request;
         $request->validate([
            'name' => 'required|string|unique:roles,name,'.$request->id,
        ]);

        $role = Role::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
            ]
        );

        
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions;
    
        return view('roles.show', compact('role', 'rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data['permissions'] = Permission::all()->pluck('title', 'id');
        $data['data'] = $role->load('permissions');
        return view('admin.roles.create', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
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
        try {
            $data = Role::findOrFail($id); 
            $data->delete();
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message'  => "Something went wrong, please try again!",
                'error_msg' => $e->getMessage(),
            ], 400);
        }
    }


//     public function delete($id)
// {
//     $user = Role::findOrFail($id);
//     $user->delete();
//     return redirect()->route('roles.index')->with('success', 'Roles Deleted successfully');
// }
}