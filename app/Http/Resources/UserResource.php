<?php

namespace App\Http\Resources;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $categoryIds = explode(',', $this->categories_id);
        $categoryTitles = Category::whereIn('id', $categoryIds)->pluck('title')->toArray();
        
        return [
            'id'             => $this->id,
            'name'           => (string) $this->name ?? '',
            'email'          => (string) $this->email ?? '',
            'phone'          => (string) $this->phone ?? '',
            'status'         => (string) $this->status ?? '',
            'age'            => (string) $this->age ?? '',
            'gender'         => (string) $this->gender ?? '',
            'location'       => (string) $this->location ?? '',
            'timezone'       => (string) $this->timezone ?? '',
            'languages'       => (string) $this->languages ?? '',
            'professional_title'       => (string) $this->professional_title ?? '',
            'short_bio'       => (string) $this->short_bio ?? '',
            'category_id'    => implode(',', $categoryIds),
            'category_name'  => implode(', ', $categoryTitles),
            
            'profile_image'  => (string) (isset($this->profile_image) ? url(config('app.profile_image').'/'.$this->profile_image) : ''),
            'action'         => ($this->name == null) ? false : true,
        ];
        
    }
}