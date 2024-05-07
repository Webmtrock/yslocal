<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Video extends Model
{
    protected $table = 'videos'; 

    protected $fillable = [
        'video_thumbnail', 
        'video_path',
        'category_id',
        'title',
        'summary',
        'author_id',
        'status',
        'video_link',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    protected  $appends = [
        'categories_name'
    ];

   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
   

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'author_id');
    }


    public function getCategoriesNameAttribute()
    {
        $categoryTitles = Category::whereIn('id', explode(",", $this->category_id))->pluck('title')->toArray();
        return implode(', ', $categoryTitles);
    }
  

}
    
    