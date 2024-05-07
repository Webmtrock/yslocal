<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\AticlesCollection;
use App\Http\Resources\Admin\AticlesSingleCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Expert;
use App\Models\Article;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class AticlesController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function aticlesList (Request $request)
    {        
        try {
            $pagination = isset($request->pagination) ? $request->pagination :6;
            $data = Article::paginate($pagination);
            
                //   dd( $data );     
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_article'), $this->success);
            }
            $this->response = new AticlesCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_article'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }
    public function aticlesExpert(Request $request)
    {
        try{
            if (Auth::guard('api')->user())
            {
                $expert = Auth::guard('api')->user();
               
                $pagination = isset($request->pagination) ? $request->pagination : 12;
                $data = Article ::where('expert_id',$expert->id)->paginate($pagination);
// dd( $data );
                if ($data->isEmpty()) {
                  //  return ResponseBuilder::successWithPagination([], [], trans('global.no_expert'), $this->success);
                    return ResponseBuilder::successMessage( trans('global.no_artical'), $this->success);
                }
                    $this->response = new AticlesCollection($data);
                    return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_article'), $this->success);
             
            }else{
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }


    public function aticlesSearch(Request $request)
    { 
        
        try {
            
            // $pagination = isset($request->pagination) ? $request->pagination : 6;
            // $query = Article::query();
        
             $perPage = $request->perPage;
             $currentPage = $request->currentPage;
             $query = Article::query();
        
            $article_title = $request->article_title;
            $category_id = $request->category_id;
        
            if ($article_title) {
                $query->where('article_title', 'like', "%$article_title%");
            }
        
            if ($category_id) {
                $query->whereRaw("FIND_IN_SET(?, category_id)", [$category_id]);
            }
             
             $data = $query->paginate($perPage, ['*'], 'page', $currentPage);
        //    $data = $query->paginate($pagination);
        
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_artical'), $this->success);
            }
        
            $this->response = new AticlesCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_article'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
            //return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(), $this->badRequest);
            
        }
    }



    public function aticlesSingleList(Request $request)
    {
        try {
            
            // $artical  = Auth::guard('api')->user();
            $articals = $request->id;
            $data = Article ::where('id',$articals)->get();
           

            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_artical'), $this->success);
            }
            $this->response = new AticlesSingleCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.my_all_article'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);

            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
           
            
        }
    }
}
