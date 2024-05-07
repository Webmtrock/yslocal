<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\AticlesCollection;
use App\Http\Resources\Expert\VideoCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Expert;
use App\Models\Article;
use App\Models\Video;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class VideoController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

   
    public function expertVideo(Request $request)
    {  
       
        try{
            if (Auth::guard('api')->user())
            {
                $expert = Auth::guard('api')->user();
              
                $pagination = isset($request->pagination) ? $request->pagination : 12;
                $data = Video ::where('author_id',$expert->id)->paginate($pagination);
               

                if ($data->isEmpty()) {
                    //return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
                    return ResponseBuilder::successMessage( trans('global.no_video'), $this->success);
                }
                    $this->response = new VideoCollection($data);
                    return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_article'), $this->success);
             
            }else{
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }
}
