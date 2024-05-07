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

class FaqController extends Controller
{
   public function faq()
   { 

    return view("frontend.faq");

   }
   
 
}