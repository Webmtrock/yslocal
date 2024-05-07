<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Spatie\Permission\Models\Permission;
use App\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      
        $data  = Permission::all();
        return view('admin.permission.index', compact('data'));
    }

    /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required | string | unique:permissions,title,'.$request->id,
            'route_name' => 'required | string | unique:permissions,route_name,'.$request->id,
        ]);

        $data = Permission::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'title' => $request->title,
                'route_name' => $request->route_name,
            ]
        );
        
        if ($data) {
            return redirect()->route('permissions.index')->with('success', 'Permission updated/created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data['data'] = Permission::where('id', $id)->first();

   
        return view('admin.permission.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Permission::where('id', $id)->first();
            $result = $data->delete();
            
            if ($result) {
                return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
            } else {
                return redirect()->route('permissions.index')->with('error', 'Failed to delete permission.');
            }
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', 'Something went wrong, please try again.');
        }
        
    }
}