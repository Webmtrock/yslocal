<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\WibinerUser;
use App\Models\Program;

use Illuminate\Support\Facades\Session;


class CouponsController extends Controller
{
    public function create(Request $request)
    {
        $program =Program::all();
        $wibinar = WibinerUser::all();
        return view('admin.coupon.create', compact('wibinar','program'));
     
    }
    // public function index()
    // {
    //     $coupons = Coupon::all();
    //     return view('admin.coupon.index', compact('coupons'));
    // }
    
    public function index()
    {
        
        $coupon = Coupon::all(); 
        return view('admin.coupon.index', compact('coupon'));
  
    }
    
    public function store(Request $request)
    {   
       $programs_id = Program::where('id',$request->webinar_id)->count();
       $workshop_id = WibinerUser::where('id',$request->webinar_id)->count();
        // Validation rules
        $rules = [
            'webinar_id' => 'required',
         //   'program_id' => 'required',
            'select_plan' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'coupon_code' => 'required|unique:coupons', 
            'discount' => 'required|numeric',
        ];
    
        
        $request->validate($rules);
        $coupon = new Coupon();
       
        if($programs_id>0){
            $coupon->program_id = $request->input('webinar_id');
        }if($workshop_id>0){
            $coupon->webinar_id = $request->input('webinar_id');
        }
      
        $coupon->select_plan = $request->input('select_plan');
        $coupon->start_date = $request->input('start_date');
        $coupon->end_date = $request->input('end_date');
        $coupon->coupon_code = $request->input('coupon_code');
        $coupon->discount = $request->input('discount');
    
        $coupon->save();
        return redirect()->route('coupon.index')->with('success', 'Coupon created successfully');

       
    }
    public function update(Request $request, $id)
{
    
    $programs_id = Program::where('id',$request->webinar_id)->count();
    $workshop_id = WibinerUser::where('id',$request->webinar_id)->count();
        // Validation rules
 
    $coupon = Coupon::findOrFail($id);

    $rules = [
        //'webinar_id' => 'required',
        'webinar_id' => 'required',
        'select_plan' => 'required',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after:start_date',
        'coupon_code' => 'nullable|unique:coupons,coupon_code,' . $coupon->id, 
        'discount' => 'nullable|numeric',
    ];
    $request->validate($rules);
    if($programs_id>0){
        $coupon->program_id = $request->input('webinar_id');
    }else{
        $coupon->program_id = null;
    }
    if($workshop_id>0){
        $coupon->webinar_id = $request->input('webinar_id');
    }else{
        $coupon->webinar_id =  null;
    }
    $coupon->select_plan = $request->input('select_plan');
    $coupon->start_date = $request->input('start_date');
    $coupon->end_date = $request->input('end_date');
    $coupon->coupon_code = $request->input('coupon_code');
    $coupon->discount = $request->input('discount');
    $coupon->save();

    return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully');
}


    public function edit($id){
        $program =Program::all();
        $wibinar = WibinerUser::all();
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.create',  compact('wibinar','program','coupon'));
    }
    

    public function destroy($id)
    {
         $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('coupon.index')->with('error', 'Article not found');
        }
        $coupon->delete();
    
        return redirect()->route('coupon.index')->with('success', 'Article deleted successfully');
    }
}