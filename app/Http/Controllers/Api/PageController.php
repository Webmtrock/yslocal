<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\AticlesCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\ContactData;
use Lang;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class PageController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected $badRequest = 400;
    protected $success = 200;
    public function contactus(Request $request)
    {
     try {
        $validSet = [
            'name' => 'required ',
            'email' => 'required ',
            'number'        => 'required',
            'message'        => 'required',
        ]; 

        $isInValid = $this->isValidPayload($request, $validSet);

        if($isInValid){
            return ResponseBuilder::error($isInValid, $this->badRequest);
        }
        $contactData = ContactData::create(
            [
                'belongs_to' => 'app_contact',
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'number' => $request->number,
                'message' => $request->message,
            ]);
              $contactData->save();
            DB::commit();

            return ResponseBuilder::successMessage(trans('global.CONTACT_DATA'), $this->success);
    } catch (\Exception $e) {
        return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
        return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
    }
}
}