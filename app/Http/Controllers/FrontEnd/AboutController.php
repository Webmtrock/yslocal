<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expert;
use App\Models\Week;
use App\Models\Time;
use App\Models\WibinerUser;
use App\Models\WibinerSession;
use App\Models\WibinerWillLearn;
use App\Models\WibinerItFor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class AboutController extends Controller
{
   public function about()
   { 

    return view("frontend.about");

   }
   public function privacyPolicy(){
      return view("frontend.privacy");
   }
   public function termsCondition(){
      return view("frontend.terms_condition");
   }

   public function refundPolicy(){
      return view("frontend.refund_policy");
   }
 
}