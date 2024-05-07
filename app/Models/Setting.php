<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'expert_id',
        'razorpay_live_key_id',
        'razorpay_live_secret_id',
        'razorpay_test_key_id',
        'razorpay_test_secret_id',
        'razorpay_active_inactive_status',
        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_from_name',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
    ];

    public static function getDataByKey($key) {
        return static::where('key', $key)->first();
    }

    public static function getAllSettingData() {
        return static::pluck('value','key');
        
    }

    // public static function getLiveKeyStatus() {
    //     return static::where('key', 'live_key_status')->value('value');
    // }

    // public static function getAllSettingData() {
    //     $settings = static::all();
    
    //     $data = [];
    //     foreach ($settings as $setting) {
    //         $data[$setting->key][$setting->id] = $setting->id;
    //     }
    
    //     return $data;
    // }
}
