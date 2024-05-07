<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\WibinerUser;
use App\Models\Program;

class ThankyouController extends Controller
{
   public function Programthankyou($id)
   { 
      $program_detail = Program::where('id',$id)->first();
    return view("frontend.program-thankyou",compact('program_detail'));

   }

   public function Workshopthankyou($id)
   { 
$webinar_detail = WibinerUser::where('id',$id)->first();
    return view("frontend.workshop-thankyou",compact('webinar_detail'));

   }


   public function landingthankyou($id)
   { 
$webinar_detail = WibinerUser::where('id',$id)->first();
    return view("frontend.landing_thankyou",compact('webinar_detail'));

   }
   

   public function thankyou()
   { 

    return view("frontend.thankyou");

   }
   public function contactthankyou()
   { 

    return view("frontend.contactthankyou");

   }
   

 
}