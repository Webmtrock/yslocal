<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class WibinerUser extends Model
{
    use HasFactory;
    protected $table = 'wibiner_user_tables';

    protected $fillable = [
        'webinar_image',
        'category_id',
        'description',
        'overview',
        'webinar_title',
        'expert_id',
        'webinar_video',
        'webinar_start_date',
        'day',
        'duration',
        'start_time',
        'end_time',
        'webinar_price',
        'whatsapp_link',
        'meeting_link',
        'expert_designation',
        'webinar_session_recording',
        'webinar_event_type',
        'number_of_enrollments',
        'status',
    ];
    protected $appends = ['favourite','categories_name','avg_rating', 'review_count', 'availability'];
    // protected  $appends = [
    //     'categories_name'
    // ];
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function week()
    {
        return $this->belongsTo(Week::class);
    }
    public function webinarFor(){
        return $this->belongsTo(WibinerItFor::class );
    }
 
    public function getCategoriesNameAttribute()
    {
        $categoryTitles = Category::whereIn('id', explode(",", $this->category_id))->pluck('title')->toArray();
        return implode(', ', $categoryTitles);
    }

    public function getFavouriteAttribute() {
        $user = Auth::guard('api')->user();
        // dd( $user);
       
        if(!$user) {
            return false;
        }
        $data = Wishlist ::where('user_id', $user->id)->where('webinar_id', $this->id)->first();
// dd(  $data);
        return !empty($data) ? true : false;
    }


    public static function getDataByWibinerUserName($keyword, $category_id = null, $pagination)
    {
        return static::where('webinar_title', 'LIKE', '%'.$keyword.'%')
                    ->when($category_id, function ($query) use ($category_id) {
                        return $query->where('category_id', $category_id);
                    })->paginate($pagination);
    }
}

