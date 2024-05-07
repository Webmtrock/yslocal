<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_category_id',
        'expert_profile',
        'name',
        'expert_designation',
        'expert_experience',
        'expert_qualification',
        'expert_language',
        'expert_description',
        'year_of_experiance',
        'patients_treated',
        'participant_enrolled',
        'expert_profile',
        'expert_thumbnail',
        'profile_video',
        'status',
    ];

    protected  $appends = [
        'categories_name'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'expert_category_id');
    }
    public function getCategoriesNameAttribute()
    {
        $categoryTitles = Category::whereIn('id', explode(",", $this->expert_category_id))->pluck('title')->toArray();
        return implode(', ', $categoryTitles);
    }
    

    public function getFavouriteAttribute() {
        $user = Auth::guard('api')->user();
        // dd( $user);
       
        if(!$user) {
            return false;
        }
        $data = Wishlist ::where('user_id', $user->id)->where('expert_id', $this->id)->first();
// dd(  $data);
        return !empty($data) ? true : false;
    }
}