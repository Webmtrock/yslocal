<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class ReportImage extends Model
{
    use HasFactory;
    protected $table = 'report_image'; 
    protected $fillable = [
        'report_id',
         'image'
    ];
   
    
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
    
 

}
