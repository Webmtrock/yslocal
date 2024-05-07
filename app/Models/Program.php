<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs'; 
    protected $fillable = [
        'title',
        'rating',
        'expert_id',
        'programming_tovideo_url',
        'image_url',
        'program_for',
        'is_popular',
        'whatsapp_group_url',
        'intake_from_link',
        'category_id',
        'entry_score',
        'program_video_thumbnail',
        'program_start_date',
    ];
    protected $appends = ['favourite','categories_name'];
    // protected  $appends = [
    //     'categories_name'
    // ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
    public static function programins() {

        return static::orderby('id','desc')->take(5)->get();
    }
    
    public function getCategoriesNameAttribute()
    {
        $categoryTitles = Category::whereIn('id', explode(",", $this->category_id))->pluck('title')->toArray();
        return implode(', ', $categoryTitles);
    }
    public function getFavouriteAttribute() {
        $user = Auth::guard('api')->user();
        if(!$user) {
            return false;
        }
        $data = Wishlist ::where('user_id', $user->id)->where('program_id', $this->id)->first();

        return !empty($data) ? true : false;
    }


    
    // public static function getDataByProgramName($keyword, $category_id = null, $pagination)
    // {
    //     return static::where('article_title', 'LIKE', '%'.$keyword.'%')
    //     ->when($category_id, function ($query) use ($category_id) {
    //         return $query->where('category_id', $category_id);
    //     })
    //     ->leftJoin('other_table', 'other_table.article_id', '=', 'articles.id')
    //     ->where('other_table.some_column', '=', $someValue)
    //     ->paginate($pagination);


    // }


    
    public static function getDataByProgramName($keyword, $category_id = null, $pagination)
    {
        return static::where('title', 'LIKE', '%'.$keyword.'%')
                    ->when($category_id, function ($query) use ($category_id) {
                        return $query->where('category_id', $category_id);
                    })->paginate($pagination);
    }


    public static function userTempCartData($userId) {
        return Program :: where('expert_id',$userId)->first();
    }



    public static function getUserCart($userId) {
        return Order :: where('program_id',$userId)->get();
    }
}
