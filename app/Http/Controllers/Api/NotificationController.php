<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\NotificationCollection;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Session;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\WibinerUser;
use App\Models\Notification;
use App\Models\User;
use Lang;
use Auth;
use DB;
use Hash;

// use Laravel\Socialite\Facades\Socialite;

class NotificationController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    
   public function notificationList()
   {
        try {
            $user = Auth::guard('api')->user();
            // dd( $user );
            $data = Notification::getNotificationByuser($user->id);
            foreach($data as $notification_data) {
                $notification_data->seen = 1;
                $notification_data->save();
            }
            $data = new NotificationCollection($data);

            // $notificationData['count'] = count($data);
            $notificationData['notificationData']  =  $data;

            return ResponseBuilder::success(trans('global.notification_list'), $this->success,$notificationData);
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }


    public function notificationDelete(Request $request)
    {
        try {
            $id = $request->id;

            $user = Auth::guard('api')->user();

            $data = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

            if ($data === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Notification not found'
                ], 200);
          
            } else {
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Notification deleted successfully'
            ], 200);
            
            }

            // dd( $user );
            // dd($data );
            


            return ResponseBuilder::success(trans('global.notification_list'), $this->success,$notificationData);
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }
}
