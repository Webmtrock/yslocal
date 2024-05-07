<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
        use HasFactory;

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public static function getDataByArticlesUserName($keyword, $category_id = null, $pagination)
    {
        return static::where('article_title', 'LIKE', '%'.$keyword.'%')
                    ->when($category_id, function ($query) use ($category_id) {
                        return $query->where('category_id', $category_id);
                    })->paginate($pagination);
    }
}