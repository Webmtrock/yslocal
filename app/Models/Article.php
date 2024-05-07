<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_title',
        'summary',
        'category_id',
        'status',
        'name',
        'article_slug',
        'meta_tag',
        'meta_description',
        'banner_image',
        'expert_id',
        // 'article_body',
        // 'is_draft',
    ];
    protected  $appends = [
        'categories_name'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function experts()
    {
        return $this->belongsTo(Expert::class ,'expert_id' );
    }
    public function expert()
    {
      return $this->belongsTo(Expert::class);
    }
    // public function categories()
    // {         
    //     return $this->belongsToMany(Category::class);     
    // }
   
    public function getCategoriesNameAttribute()
    {
        $categoryTitles = Category::whereIn('id', explode(",", $this->category_id))->pluck('title')->toArray();
        return implode(', ', $categoryTitles);
    }
    

}