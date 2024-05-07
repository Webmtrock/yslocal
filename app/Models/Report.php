<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports'; 
    protected $fillable = [
        'user_id',
        'program_id',
        'batch_id',
        'report_title',
        'report_description'

    ];
   
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function programName()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function batchName()
    {
        return $this->belongsTo(ProgramBatch::class, 'batch_id');
    }
 
    public function getReportImage(){
        return $this->hasMany(ReportImage::class,'report_id','id');
    }

}
