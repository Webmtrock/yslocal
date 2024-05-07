<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Expert;
use App\Models\ProgramPlan;
use App\Models\ProgramPlanType;
use App\Models\ProgramLesson;
use App\Models\ProgramFaq;
use App\Models\ProgramBatch;
use App\Models\Category;
use App\Models\ProgramSession;
use App\Models\ProgramSessionResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class BatchController extends Controller
{
 
   
        
    public function BatchList($id){
        try {
            $programName = Program::where('id',$id)->first();
            
            $batchs = ProgramBatch::where('program_id',$id)->get();
            return view('admin.batch.list',compact('programName','batchs'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
   

    public function BatchAdd()
    {
       
        return view('admin.batch.add');
    }   


    public function BatchStore(Request $request)
    {
        // dd($request->program_id);
            
            $rules = [
                'batch_name' => 'required|max:255',
                'batch_start_date' => 'required',
                'batch_end_date' => 'required',
            ];
            $request->validate($rules);

            $count = ProgramBatch::where('name', $request->batch_name)
                ->where('program_id', $request->program_id)
                ->count();
            if ($count > 0) {
                return redirect()->back()->withErrors(['batch_name' => 'The batch name must be unique.'])->withInput();
            }

            $ProgramBatch= ProgramBatch::where('program_id',$request->program_id)->pluck('id');
            if(count($ProgramBatch) == 0){
                $batch = new ProgramBatch;
                $batch->program_id = $request->program_id;
                $batch->name = $request->batch_name;
                $batch->batch_start_date = $request->batch_start_date;
                $batch->batch_end_date = $request->batch_end_date;
                $batch->save();
            }else{
                $batch = new ProgramBatch;
                $batch->program_id = $request->program_id;
                $batch->name = $request->batch_name;
                $batch->batch_start_date = $request->batch_start_date;
                $batch->batch_end_date = $request->batch_end_date;
                $batch->save();
                $session = ProgramSession::whereIn('program_batch_id',$ProgramBatch)->where('status','1')->get();
                if(count($session) != 0){
                    foreach($session as $val){
                        $sessionProgram = new ProgramSession; 
                        $sessionProgram->program_batch_id = $batch->id;
                        $sessionProgram->session_title =$val->session_title;
                        $sessionProgram->session_description =$val->session_description;
                        $sessionProgram->save();
                        $resource = ProgramSessionResource::where('program_session_id',$val->id)->get();
                        if(count($resource) != 0){
                            foreach($resource as $res){
                                $fileresorce =  new ProgramSessionResource;
                                $fileresorce->file_path = $res->file_path;
                                $fileresorce->file_type = $res->file_type;
                                $fileresorce->program_session_id = $sessionProgram->id;
                                $fileresorce->save();   
                            } 
                        } 
                    }
                }

            }
            // Handle Add Faq End
            $message = 'Program Batch Added successfully';
            return redirect()->route('batch.list',$request->program_id)->with('success', $message);
       
        
    }


    
    

    public function BatchEdit(Request $request, $id)
    {
        $batch = ProgramBatch::where('id',$id)->first();
    
        return view('admin.batch.edit', compact('batch'));
    }

    public function BatchUpdate(Request $request, $id = null)
    {
        $rules = [
            'batch_name' => 'required',
            'batch_start_date' => 'required',
            'batch_end_date' => 'required',
        ];
        $request->validate($rules);
        $batch = ProgramBatch::findOrFail($id);
        $batch->name = $request->batch_name;
        $batch->batch_start_date = $request->batch_start_date;
        $batch->batch_end_date = $request->batch_end_date;
        $batch->update();
        
        // Handle Add Faq End
        $message = 'Program Batch Updated successfully';
        return redirect()->route('batch.list',$request->program_id)->with('success', $message);
    }
    
   
    public function BatchDelete ($id)
    {
        $planstypes = ProgramBatch::where('id',$id)->delete();
       
        return redirect()->back()->with('success', 'Program Batch Deleted successfully');
    }

    public function Status($id)
    {
        $program = Program::findOrFail($id);
        if($program->status == '1'){
            $program->status = 0;
        }else{
            $program->status = 1;
        }
        $program->update();
        return redirect()->route('programs.index')->with('success', 'Program status change successfully');
    }


   
    
    

    
    
}
