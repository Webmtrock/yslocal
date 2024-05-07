<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'webinar_id',
        'program_id',
        'expert_id',
        
    ];

    public function store() {
        return $this->hasOne(VendorProfile::class, 'id', 'product_id');
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public static function getDataByUserAndStoreId($userId, $webinar_id) {
        return static::where('user_id', $userId)->where('webinar_id', $webinar_id)->first();
    }
    public static function getDataByUserAndStoreIdPROGRAM($userId, $program_id) {
        return static::where('user_id', $userId)->where('program_id', $program_id)->first();
    }
    public static function getDataByUserAndStoreIdEXPERT($userId, $expert_id) {
        return static::where('user_id', $userId)->where('expert_id', $expert_id)->first();
    }

    public static function getIdByUserId($userId) {
        return static::where('user_id', $userId)->pluck('webinar_id');
    }
    
    public static function getIdByUserIdPROGRAM($userId) {
        return static::where('user_id', $userId)->pluck('program_id');
    }
    public static function getIdByUserIdExpert($userId) {
        return static::where('user_id', $userId)->pluck('expert_id');
    }
    

}