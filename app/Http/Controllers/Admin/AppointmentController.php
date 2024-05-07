<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Expert;
use App\Models\ProgramPlan;
use App\Models\ProgramPlanType;
use App\Models\ProgramLesson;
use App\Models\Appointment;
use App\Models\ProgramBatch;
use App\Models\Category;
use App\Models\ProgramSession;
use App\Models\ProgramReviewsImages;
use App\Models\ProgramSessionResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class AppointmentController extends Controller
{
 
   

    public function index(){
        try {
            $Appointment = Appointment::get();
            return view('admin.appointment.index',compact('Appointment'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function add(){
       
        try {

           $appointment = Appointment::where('user_id',auth()->user()->id)->first();
            return view('admin.appointment.edit', compact('appointment'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');

        }
    }


    public function update(Request $request, $id){
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->link = $request->link;
            $appointment->price = $request->price;
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment updated successfully.');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
    
    
    public function delete($id)
{

     $appointment = Appointment::find($id);
     
    if (!$appointment) {
        return redirect()->route('appointment.list')->with('error', 'Appointment not found');
    }
    $appointment->delete();

    return redirect()->route('appointment.list')->with('success', 'Appointment deleted successfully');
}

 
    
    
}