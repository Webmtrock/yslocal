<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $serverError = 500;
    
    static public function isValidPayload(Request $request, $validSet,$errorMessage=[]){
        $validator = Validator::make($request->all(), $validSet,$errorMessage );

        if($validator->fails()) {
            return $validator->errors()->first();
        }
    }
}
