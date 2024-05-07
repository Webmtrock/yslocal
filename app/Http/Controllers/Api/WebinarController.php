<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\WebinarCollection;
use App\Http\Resources\Admin\MyWebinarCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\WibinerUser;
use App\Models\Order;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class WebinarController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function webinarList (Request $request)
    {        
        try { 
            
            $pagination = isset($request->pagination) ? $request->pagination : 12;
            $data = WibinerUser::paginate($pagination);
            // dd($data);
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_webinar'), $this->success);
            }
            $this->response = new WebinarCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_webinar'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }

    public function myWebinar(Request $request)
    {
        try { 

            if (Auth::guard('api')->user()) {
                $user = Auth::guard('api')->user();
                // dd( $user);
                
                //   $perPage = $request->perPage;
                //   $currentPage = $request->currentPage;
                //   $data = Order::where('user_id',$user->id)->whereNotNull('webinar_id');
                //   dd($data);
                
                $pagination = isset($request->pagination) ? $request->pagination : 12;
                $data = Order::where('user_id',$user->id)->whereNotNull('webinar_id')->paginate($pagination);
                
                                //  dd($data);
                if ($data->isEmpty()) {
                    
                    return ResponseBuilder::successWithPagination([], [], trans('global.no_webinar'), $this->success);
                }
                $this->response = new MyWebinarCollection($data);
                return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_webinar'), $this->success);
            }else{
               return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }
    public function expertMyWebinar(Request $request)
    {
        try{
            if (Auth::guard('api')->user())
            {
                $expert = Auth::guard('api')->user();
                // dd($expert);
                $pagination = isset($request->pagination) ? $request->pagination : 12;
                $data = WibinerUser ::where('expert_id',$expert->id)->paginate($pagination);
                if ($data->isEmpty()) {
                   // return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
                   return ResponseBuilder::successMessage( trans('global.no_webinar'), $this->success);

                }
                    $this->response = new WebinarCollection($data);
                    return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_webinar'), $this->success);
             
            }else{
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }



    public function myWebinarSearch(Request $request)
    { 

        try {
            if (Auth::guard('api')->check()) {
                $user = Auth::guard('api')->user();
                
                 $perPage = $request->perPage;
                 $currentPage = $request->currentPage;
                 $query = Order::where('user_id', $user->id)->whereNotNull('program_id');
                // $pagination = $request->pagination ?? 12;
                // $query = Order::where('user_id', $user->id)->whereNotNull('webinar_id');
                
                $webinar_title = $request->webinar_title;
                $category_id = $request->category_id;
                if ($webinar_title) {
                    $query->whereHas('webinar', function ($query) use ($webinar_title) {
                        $query->where('webinar_title', 'like', "%$webinar_title%");
                    });
                }
                if ($category_id) {
                    $query->whereHas('webinar', function ($query) use ($category_id) {
                        $query->whereRaw("FIND_IN_SET(?, category_id)", [$category_id]);
                    });
                }
                
                 $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
                
               // $data = $query->paginate($pagination);
                if ($data->isEmpty()) {
                    return ResponseBuilder::successWithPagination([], [], trans('global.no_webinar'), $this->success);
                }
                $this->response = new MyWebinarCollection($data);
                return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_webinar'), $this->success);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }    
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage() . ' at line ' . $e->getLine() . ' at file ' . $e->getFile(), $this->badRequest);
        }
    }


    public function webinarListSearch(Request $request) 
    {
        try {
            // $pagination = isset($request->pagination) ? $request->pagination : 12;
            // $query = WibinerUser::query();
             
             $perPage = $request->perPage;
             $currentPage = $request->currentPage;
             
             $query = WibinerUser::query();
                  
            //   dd($query);        
            $webinar_title = $request->webinar_title;
            $category_id = $request->category_id;
        
            if ($webinar_title) {
                $query->where('webinar_title', 'like', "%$webinar_title%");
            }
        
            if ($category_id) {
                $query->whereRaw("FIND_IN_SET(?, category_id)", [$category_id]);
            }
        
            $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
           // $data = $query->paginate($pagination);
        
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_webinar'), $this->success);
            }
        
            $this->response = new WebinarCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_webinar'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(), $this->badRequest);
            
        }
    }
}
