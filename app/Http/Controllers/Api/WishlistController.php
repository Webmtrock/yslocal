<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductCollection;
use App\Http\Resources\Admin\WebinarCollection;
use App\Http\Resources\Admin\VendorCollection;
use App\Http\Resources\Admin\PrograminsCollection;
use App\Http\Resources\Admin\WishlistPrograminsCollection;
use App\Http\Resources\Admin\ExpertsCollection;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Models\Product;
use App\Models\WibinerUser;
use App\Models\Wishlist;
use App\Models\Program;
use App\Models\Expert;
use App\Models\VendorProfile;
use App\Models\ProgramReviewsImages;
use Auth;
use DB;

class WishlistController extends Controller
{  
    protected $badRequest = 400;
    protected $success = 200;
    public function addRemoveWishlist(Request $request)
    {
        DB::beginTransaction();
        try {

            $user = Auth::guard('api')->user();

            $validSet = [
                'webinar_id' => 'required | integer',
            ];
            
            $isInvalid = $this->isValidPayload($request, $validSet);
            if ($isInvalid) {
                return ResponseBuilder::error($isInvalid, 400); 
            }
            // $isInValid = $this->isValidPayload($request, $validSet);   

            // dd($isInValid);

            // if($isInValid){
            //     return ResponseBuilder::error($isInValid, $this->badRequest);
            // }

            if(isset($request->webinar_id)) {
            $store = WibinerUser::where('id',$request->webinar_id)->first();
                
           if(!$store) {
                    return ResponseBuilder::error(trans('global.invalid_webinar_id'),200);
                }
            }

            $wishlist = Wishlist::getDataByUserAndStoreId($user->id, $request->webinar_id);

            if($wishlist) {
                $wishlist->delete();
                DB::commit();
                return ResponseBuilder::successMessage(trans('global.WISHLIST_REMOVED'), 200); 
            }

            Wishlist::create([
                'user_id' => $user->id,
                'webinar_id' => $request->webinar_id,
                
                
            ]);

            DB::commit();
            return ResponseBuilder::successMessage(trans('global.WISHLIST_ADDED'),200); 
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),400);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),400);
        }
    }

    public function list(Request $request)
    {
        try {            
            $user = Auth::guard('api')->user();
            
            $wishlistStores = Wishlist::getIdByUserId($user->id) ;
            $getproduct = WibinerUser::whereIn('id', $wishlistStores)->get();
            $this->response = new WebinarCollection( $getproduct);
            return ResponseBuilder::success(trans('global.all_wishlist_Stores'), 200, $this->response);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),200);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),200);
        }
    }


    public function addRemoveWishlistProgram(Request $request)
    {
        DB::beginTransaction();
        try {

            $user = Auth::guard('api')->user();

            $validSet = [
                'program_id' => 'required | integer',
            ];
            
            $isInvalid = $this->isValidPayload($request, $validSet);
            if ($isInvalid) {
                return ResponseBuilder::error($isInvalid, 400); 
            }
            // $isInValid = $this->isValidPayload($request, $validSet);   

            // dd($isInValid);

            // if($isInValid){
            //     return ResponseBuilder::error($isInValid, $this->badRequest);
            // }

            if(isset($request->program_id)) {
            $store = Program::where('id',$request->program_id)->first();
                
           if(!$store) {
                    return ResponseBuilder::error(trans('global.invalid_program_id'),200);
                }
            }

            $wishlist = Wishlist::getDataByUserAndStoreIdPROGRAM($user->id, $request->program_id);

            if($wishlist) {
                $wishlist->delete();
                DB::commit();
                return ResponseBuilder::successMessage(trans('global.WISHLIST_REMOVED_PROGRAM'), 200); 
            }

            Wishlist::create([
                'user_id' => $user->id,
                'program_id' => $request->program_id,
                
                
            ]);
            DB::commit();
            return ResponseBuilder::successMessage(trans('global.WISHLIST_ADDED_PROGRAM'),200); 
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),400);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),400);
        }
    }


    public function listProgram(Request $request)
    {
        try {            
            $user = Auth::guard('api')->user();
            //  dd($user);
            $wishlistStores = Wishlist::getIdByUserIdPROGRAM($user->id) ;
            $getproduct = Program::whereIn('id', $wishlistStores)->get();
            // dd($getproduct);
            $this->response = new WishlistPrograminsCollection( $getproduct);
            return ResponseBuilder::success(trans('global.all_Program_Stores'), 200, $this->response);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),200);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),200);
        }
    }



    public function addRemoveWishlistExpert(Request $request)
    {
        DB::beginTransaction();
        try {

            $user = Auth::guard('api')->user();

            $validSet = [
                'expert_id' => 'required | integer',
            ];
            
            $isInvalid = $this->isValidPayload($request, $validSet);
            if ($isInvalid) {
                return ResponseBuilder::error($isInvalid, 400); 
            }
            // $isInValid = $this->isValidPayload($request, $validSet);   

            // dd($isInValid);

            // if($isInValid){
            //     return ResponseBuilder::error($isInValid, $this->badRequest);
            // }

            if(isset($request->expert_id)) {

            $store = Expert::where('id',$request->expert_id)->first();
                
           if(!$store) {
                    return ResponseBuilder::error(trans('global.invalid_expert_id'),200);
                }
            }

            $wishlist = Wishlist::getDataByUserAndStoreIdEXPERT($user->id, $request->expert_id);

            if($wishlist) {
                $wishlist->delete();
                DB::commit();
                return ResponseBuilder::successMessage(trans('global.WISHLIST_REMOVED_EXPERT'), 200); 
            }

            Wishlist::create([
                'user_id' => $user->id,
                'expert_id' => $request->expert_id,
                
                
            ]);
            DB::commit();
            return ResponseBuilder::successMessage(trans('global.WISHLIST_ADDED_EXPERT'),200); 
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),400);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),400);
        }
    }

    public function listExpert(Request $request)
    {
        try {            
            $user = Auth::guard('api')->user();
            $wishlistStores = Wishlist::getIdByUserIdExpert($user->id) ;
            $getproduct = Expert::whereIn('id', $wishlistStores)->get();
           
            $this->response = new ExpertsCollection( $getproduct);
            return ResponseBuilder::success(trans('global.all_Program_Stores'), 200, $this->response);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),200);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),200);
        }
    }
}