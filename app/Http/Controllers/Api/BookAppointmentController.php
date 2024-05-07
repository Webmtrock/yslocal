<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\BookAppointment;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class BookAppointmentController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function addBookAppointment (Request $request)
    {        
        try {
            
            $validSet = [
                'name' => 'required ',
                'email' => 'required ',
                //'phone'        => 'required',
                'appointment_condition'        => 'required',
                'appointment_date_time'        => 'required',
                'previous_reports'        => 'required',
                'problem_description'        => 'required',
            ]; 

            $isInValid = $this->isValidPayload($request, $validSet);

            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            $user = Auth::guard('api')->user();
            $imagePath = config('app.previous_reports');
            $bookAppointmentrData = BookAppointment::create(
                [
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'appointment_condition' => $request->appointment_condition,
                    'appointment_date_time' => $request->appointment_date_time,
                    'previous_reports' => $request->previous_reports,
                    'problem_description' => $request->problem_description,
                    'previous_reports' => $request->hasfile('previous_reports') ? Helper::storeImage($request->file('previous_reports'), $imagePath, $request->previous_reportskOld) : (isset($request->previous_reportskOld) ? $request->previous_reportskOld : ''),
                ]);
                $bookAppointmentrData->save();

                DB::commit();
                return ResponseBuilder::successMessage(trans('global.BOOK_APPOINTMENTR'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }
}
