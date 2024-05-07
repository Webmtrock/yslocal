<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\ExpertsCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Expert;
use Lang;

// use Laravel\Socialite\Facades\Socialite;

class ExpertsController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function expertsList(Request $request)
    { 
       
        try {
            // $pagination = isset($request->pagination) ? $request->pagination : 12;
            // $data = Expert::paginate($pagination); 
             $perPage = $request->perPage;
             $currentPage = $request->currentPage;
             $data = Expert::where('status', 1)->paginate($perPage, ['*'], 'page', $currentPage);
            
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
            }
            $this->response = new ExpertsCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_expert'), $this->success);
        } catch (\Exception $e) {
            //return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }


    public function expertsSerach(Request $request)
    {
        try {
            // $pagination = isset($request->pagination) ? $request->pagination : 12;
           
          
              $perPage = $request->perPage;
              $currentPage = $request->currentPage; 
              $query = Expert::query();
            //   $data = Expert::where('status', 1)->paginate($perPage, ['*'], 'page', $currentPage);          
        
              
        
            $name = $request->name;
            $expert_category_id = $request->expert_category_id;
        
            if ($name) {
                $query->where('name', 'like', "%$name%");
            }
        
            if ($expert_category_id) {
                $query->whereRaw("FIND_IN_SET(?, expert_category_id)", [$expert_category_id]);
            }
        
            // $data = $query->paginate($pagination);
            $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
        
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
            }
        
            $this->response = new ExpertsCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_expert'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
            //return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(), $this->badRequest);
            
        }
    }
}
