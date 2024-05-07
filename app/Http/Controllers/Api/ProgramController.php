<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\PrograminsCollection;
use App\Http\Resources\Admin\MyPrograminsCollection;
use App\Http\Resources\Admin\validateProgramPurchaseCollection;
use App\Http\Resources\Admin\PatientCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\User;
use App\Models\Program;
use App\Models\Order;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class ProgramController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function programList(Request $request)
    { 
        try {
            // $pagination = isset($request->pagination) ? $request->pagination : 12;
            // $data = Program::paginate($pagination);
             $perPage = $request->perPage;
             $currentPage = $request->currentPage;
             $data = Program::where('status', 1)->paginate($perPage, ['*'], 'page', $currentPage);
            $user = Auth::guard('api')->user();
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'), $this->success);
            }
            $this->response = new PrograminsCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins'), $this->success);

            // if (Auth::guard('api')->user()) {
            //     $user = Auth::guard('api')->user();
            //     $pagination = isset($request->pagination) ? $request->pagination : 12;
            //     $data = Order::where('user_id', $user->id)->whereNotNull('webinar_id')->paginate($pagination);
            //     if ($data->isEmpty()) {
            //         return ResponseBuilder::successWithPagination([], [], trans('global.no_webinar'), $this->success);
            //     }
            //     $this->response = new MyWebinarCollection($data);
            //     return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_webinar'), $this->success);
            // }else{
            //    return response()->json(['message' => 'Invalid credentials'], 401);
            // }
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }
    public function myProgramList(Request $request)
    {
        try {
             if (Auth::guard('api')->user())
                {
                      $user = Auth::guard('api')->user();
                    //  $pagination = isset($request->pagination) ? $request->pagination : 25;
                    //  $data = Order ::where('user_id',$user->id)->whereNotNull('program_id')->orderBy('created_at', 'desc')->paginate($pagination);
                      $perPage = $request->perPage;
                      $currentPage = $request->currentPage;
                      $data = Order::where('user_id', $user->id)->whereNotNull('program_id')->paginate($perPage, ['*'], 'page', $currentPage);
                    if ($data->isEmpty()) {
                        return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'), $this->success);
                    }
                    $this->response = new MyPrograminsCollection($data);
                    return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_programins'), $this->success);
                }else{
                   return response()->json(['message' => 'Invalid credentials'], 401);
                }
            } catch (\Exception $e) {
                return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
                return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
            }
        
    }

    public function myProgramListSearch(Request $request)
    { 

        try {
            if (Auth::guard('api')->check()) {
                $user = Auth::guard('api')->user();
                
                 $perPage = $request->perPage;
                 $currentPage = $request->currentPage;
                 $query = Order::where('user_id', $user->id)->whereNotNull('program_id');
                //$query = Order::where('user_id', $user->id)->whereNotNull('program_id')->paginate($perPage, ['*'], 'page', $currentPage);
                // dd( $data);
                
                //  $pagination = $request->pagination ?? 12;
                //  $query = Order::where('user_id', $user->id)->whereNotNull('program_id');
                
                $title = $request->title;
                $category_id = $request->category_id;
                if ($title) {
                    $query->whereHas('program', function ($query) use ($title) {
                        $query->where('title', 'like', "%$title%");
                    });
                }
                if ($category_id) {
                    $query->whereHas('program', function ($query) use ($category_id) {
                        $query->whereRaw("FIND_IN_SET(?, category_id)", [$category_id]);
                    });
                }
                $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
                // $data = $query->paginate($pagination);
                
                if ($data->isEmpty()) {
                    return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'), $this->success);
                }
                $this->response = new MyPrograminsCollection($data);
                return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_programins'), $this->success);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }    
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage() . ' at line ' . $e->getLine() . ' at file ' . $e->getFile(), $this->badRequest);
        }
    }
    

    

    public function expertProgram(Request $request)
    {
        try{
            if (Auth::guard('api')->user())
            {
                $expert = Auth::guard('api')->user();
                $pagination = isset($request->pagination) ? $request->pagination : 12;
                $data = Program ::where('expert_id',$expert->id)->paginate($pagination);
                if ($data->isEmpty()) {
                 //   return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
                    return ResponseBuilder::successMessage( trans('global.no_program'), $this->success);
                }
                    $this->response = new PrograminsCollection($data);

                    return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_expert'), $this->success);
             
            }else{
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }


    public function myProgramPatientDetail(Request $request) 
     {  
        try{
            $id = $request->program_id;
             $user = Auth::guard('api')->user();

             $ProgramOrderData = Order::where('program_id', $id)->where('user_id', $user->id)->first();
        //    dd($ProgramOrderData);
             
             if($ProgramOrderData){
                $planduration = $ProgramOrderData->planduration ?? 'No plan duration available';

                // dd($planduration);
                $patientsss = Order::with('getPatientDeltai')->where('parent_id', $ProgramOrderData->user_id)->get();
                $parentIds = $patientsss->pluck('user_id')->toArray();
                $parentes = User::whereIn('id', $parentIds)->get();
                
               if( $parentes){
                $responseData = [
                    'plandurationCount' => $planduration,
                    'patient_detail' => $parentes,
                ];
                return ResponseBuilder::success(trans('global.my_all_patients'),200,$responseData); 
               }else{
                return response()->json(['message' => 'No Data Found'], 200);
               }
             }else{
                return response()->json(['message' => 'Program denot Match'], 200);
             }
             

        //     $parent_ids =  Order::where('program_id',$id)->pluck('parent_id')->toArray();
            
        //     $parentes =  User::whereIn('id',$parent_ids)->get();
        //     $data = [];
        //     $data ['ProgramOrderData'] = $ProgramOrderData;

        //   $data['patients'] = $parentes;

        //      if($data){
               
        //             return ResponseBuilder::success(trans('global.my_all_patients'),200,$data); 
               

        //      }else{
        //             return response()->json(['message' => 'No Data Found'], 200);
        //      }
            //  if($ProgramOrderData)
            //  {
            //     if($ProgramOrderData){
            //         //$patients = Order::with('getPatient')->where('parent_id',$ProgramOrderData->user_id)->where('program_id',$ProgramOrderData->program_id)->get();
                    
            //         $patients = Order::with('getPatient')->where('user_id',$ProgramOrderData->user_id)->where('program_id',$ProgramOrderData->program_id)->get();
            //         // dd($patients);
            //         $this->response = new PatientCollection($patients);
            //         return ResponseBuilder::successWithPagination($patients, $this->response, trans('global.my_all_patients'), $this->success);
            // }else{
            //     return response()->json(['message' => 'No Data Found'], 401);
            // }
            // }else{
            //     return response()->json(['message' => 'No Data Found'], 401);
            // }
            //  dd($ProgramOrderData);
                  
        }catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        
        }
    }
    public function programListSearch(Request $request)
    {
        try {
            // $pagination = isset($request->pagination) ? $request->pagination : 12;
            // $query = Program::query();
              $perPage = $request->perPage;
              $currentPage = $request->currentPage; 
              $query = Program::query();
        
        // dd( $query);
            $title = $request->title;
            $category_id = $request->category_id;
        
            if ($title) {
                $query->where('title', 'like', "%$title%");
            }
        
            if ($category_id) {
                $query->whereRaw("FIND_IN_SET(?, category_id)", [$category_id]);
            }
            $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
           // $data = $query->paginate($pagination);
        
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'), $this->success);
            }
        
            $this->response = new PrograminsCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(), $this->badRequest);
            
        }
    }  
    
    public function validateProgramPurchase(Request $request)
    {   
        try {
            if (Auth::guard('api')->user())
               {
                   $user = Auth::guard('api')->user();
                   $id = $request->program_id;
                   $pagination = isset($request->pagination) ? $request->pagination : 25;
                   $data = Order ::where('program_id', $id)->where('user_id',$user->id)->whereNotNull('program_id')->orderBy('created_at', 'desc')->paginate($pagination);
                //    dd($data);
                   if ($data->isEmpty()) {
                       return ResponseBuilder::successWithPagination([], [], trans('global.Program_No_Purchase'), $this->success);
                   }
                   $this->response = new validateProgramPurchaseCollection($data);
                   return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins_Purchase'), $this->success);
               }else{
                  return response()->json(['message' => 'Invalid credentials'], 401);
               }
           } catch (\Exception $e) {
               return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
               return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
           }
   
    }
}
