<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportImage;




class ReportController extends Controller
{
    
    public function index(){
        try {
            $Report = Report::with('programName','batchName')->get();
          
            return view('admin.report.index',compact('Report'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   

   
    
    public function add()
    { 
       
        
    }

   
    public function store(Request $request)
    {
     
        
    }
    
    public function showreportimages(Request $request, $id)
{
     $reportImages = ReportImage::where('report_id', $id)->get();
    return view('admin.report.view', ['reportImages' => $reportImages]);
}


    public function delete($id)
    {
    
         $report = Report::find($id);
         
        if (!$report) {
            return redirect()->route('report.list')->with('error', 'Report not found');
        }
        $report->delete();
    
        return redirect()->route('report.list')->with('success', 'Report deleted successfully');
    }

    
}