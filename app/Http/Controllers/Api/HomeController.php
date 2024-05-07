<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\PrograminsCollection;
use App\Http\Resources\Admin\MyWebinarCollection;
use App\Http\Resources\Admin\ExpertsCollection;
use App\Http\Resources\Admin\WebinarCollection;
use App\Http\Resources\Admin\ArticlesCollection;
use App\Http\Resources\Admin\SliderCollection;
use App\Http\Resources\Admin\ProgramCategoryCollection;
use App\Http\Resources\Admin\CategoryWebinerCollection;
use App\Http\Resources\Admin\ConcernsCollection;
use App\Http\Resources\Admin\ConcernsHomeCollection;
use App\Http\Resources\Admin\OurOfferingsCollection;
use App\Http\Resources\Admin\ExpertDetailsCollection;
use App\Http\Resources\Admin\ArticlesHomeCollection;
use App\Models\Category;
use App\Models\Setting;
use App\Models\ExpertWebsite\ExpertWebsiteHome;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Concerns;
use App\Models\WibinerUser;
use App\Models\Expert;
use App\Models\Slider;
use App\Models\Articles;

use App\Helper\ResponseBuilder;

class HomeController extends Controller
{
    protected $success = true;
    protected $badRequest = 400;

  
    public function home()
    { 
        try {

             $user = Auth::guard('api')->user();
             $homePageData = [];
             $siteSetting = Setting:: getAllSettingData();
             $datas = Category::category();
             $program = Program::where('is_popular',1)->get();
             $category_program = Program::where('is_popular',1)->get();
             $category_webiner = WibinerUser::where('is_popular',1)->get();
             $webinerUser = WibinerUser::where('is_popular',1)->get();
             $articles = Articles::paginate(6);
             $concerns = Concerns::paginate(6);
             $expert = Expert::where('is_popular',1)->get();
             $homePageData['articles'] = new ArticlesHomeCollection($articles);
             $homePageData['category'] = new CategoryCollection($datas);
             $homePageData['program_category'] = new ProgramCategoryCollection($category_program);
             $homePageData['category_webiner'] = new CategoryWebinerCollection($category_webiner);
             $homePageData['top_programins'] = new PrograminsCollection($program);
             $homePageData['top_webiner'] = new WebinarCollection($webinerUser);
             $homePageData['top_expert'] = new ExpertsCollection($expert);
             $homePageData['concerns'] = new ConcernsHomeCollection($concerns);
             $homePageData['program'] = $siteSetting['program'];
             $offerings[] = [
                'our_offerings_program_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_program_image']),
                'our_offerings_program_name' =>  $siteSetting['our_offerings_program_name'],
                'our_offerings_workshop_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_workshop_image']),
                'our_offerings_workshop_name' =>  $siteSetting['our_offerings_workshop_name'],
                'our_offerings_healthpedia_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_healthpedia_image']),
                'our_offerings_healthpedia_name' => $siteSetting['our_offerings_healthpedia_name'],
                'our_offerings_consultation_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_consultation_image']),
                'our_offerings_consultation_name' => $siteSetting['our_offerings_consultation_name'],                    
            ];
             $homePageData ['our_offerings'] =  $offerings;                 
             $homePageData ['register_as_an_expert_app_image']        = url(config('app.logo') . '/' . $siteSetting['register_as_an_expert_app_image']);
             $homePageData['register_as_an_expert_app_text'] = $siteSetting['register_as_an_expert_app_text'];
             $homePageData['register_as_an_expert_app_text'] = $siteSetting['register_as_an_expert_app_text'];
           return ResponseBuilder::success(trans('global.home_page_data'),200,$homePageData);
           
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
            
        }
    }


    public function searchResult(Request $request){
        try {

            $user = Auth::guard('api')->user();
        //    dd($user);
            // $latitude = $user->latitude;
            // $longitude = $user->longitude;
            // $distance = 10;
            $pagination = $request->pagination ?? 10;
           
            $perPage = 5;
            // Validation start
            $validSet = [
                'keyword' => 'required'
            ]; 
            
            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            
            $data = Program :: getDataByProgramName($request->keyword, $request->category_id,$pagination);

            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'),200);
            }
            
            $this->response = new PrograminsCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins'), 200);
            
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    
      }
    public function webinarsearchResult(Request $request){
        try {

            $user = Auth::guard('api')->user();
           
            // $latitude = $user->latitude;
            // $longitude = $user->longitude;
            // $distance = 10;
            $pagination = $request->pagination ?? 10;
           
            $perPage = 5;
            // Validation start
            $validSet = [
                'keyword' => 'required'
            ]; 
            
            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            
            $data = WibinerUser::getDataByWibinerUserName($request->keyword, $request->category_id,$pagination);
           

            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'),200);
            }
            
            $this->response = new WebinarCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins'), 200);
            
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    
      }
    public function aticlessearchResult(Request $request){
        try {

            $user = Auth::guard('api')->user();
            $homePageData = [];
            // $latitude = $user->latitude;
            // $longitude = $user->longitude;
            // $distance = 10;
            $pagination = $request->pagination ?? 10;
           
            $perPage = 5;
            // Validation start
            $validSet = [
                'keyword' => 'required'
            ]; 
            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            $data = Articles::getDataByArticlesUserName($request->keyword, $request->category_id,$pagination);
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_programins'),200);
            }
            $this->response = new ArticlesCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_programins'), 200);
            
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    
      }

      public function expertHome(Request $request)
      {
        try {

            $user = Auth::guard('api')->user();
            $data = Program ::where('expert_id',$user->id)->get();
            $webinar = WibinerUser ::where('expert_id',$user->id)->get();
            $article = Articles ::where('expert_id',$user->id)->get();
            $ExpertWebsiteHome = ExpertWebsiteHome::where('expert_id', $user->id)->where('session_name', 'First')->get();
            $ExpertWebsiteHome = ExpertWebsiteHome::where('expert_id', $user->id)->where('session_name', 'Second')->get();
            $homePageData['expert_details'] = new ExpertDetailsCollection($ExpertWebsiteHome);
            $homePageData['treatment_approach'] = new ExpertDetailsCollection($ExpertWebsiteHome);
            $homePageData['upcoming_program'] = new PrograminsCollection($data);
            $homePageData['upcoming_webinar'] = new WebinarCollection($webinar);
            $homePageData['upcoming_blog'] = new ArticlesCollection($article);
          return ResponseBuilder::success(trans('global.home_page_data'),200,$homePageData);
           
           //return ResponseBuilder::success(trans('global.home_page_data'), $homePageData);
       } catch (\Exception $e) {
           return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
           return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
           
       }
      }
}
