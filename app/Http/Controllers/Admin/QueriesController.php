<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Expert;
use Illuminate\Support\Facades\Storage;


class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsletter()
    { 
        
        $newsletter = DB::table('newsletter')->get();
        return view('admin.queries.newsletter', compact('newsletter'));
    }
    public function contactform()
    { 
        
        $contactform = DB::table('contact_form')->get();
        return view('admin.queries.contactform', compact('contactform'));
    }
    public function concernform()
    { 
        
        $concernform = DB::table('concern_form')->get();
        return view('admin.queries.concernform', compact('concernform'));
    }
   
    
}