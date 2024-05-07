<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'webinar_id',
        'program_id',
        'select_plan',
        'start_date',
        'end_date',
        'coupon_code',
        'discount',
       
    ];
    public function wibinar()
    {
        return $this->belongsTo(WibinerUser::class ,'webinar_id' );
      
    }

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }
    // public function experts()
    // {
    //     return $this->belongsTo(Expert::class ,'expert_id' );
    // }
    public static function getCouponByVendor($couponCode) {

        $todayDate = date('Y-m-d');
        return static::where('status', 1)->where('coupon_code',$couponCode)->first();
    }
}