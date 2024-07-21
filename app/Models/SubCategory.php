<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     public function category()
     {
        return $this->belongsTo(Category::class);
     }

     public function scopeFilter($query, $filter)
    {
        if(isset($filter['keyword']) ?? false)
        {
            return $query->where('name', 'Like', '%' . $filter['keyword'] . '%');
        }
    }
}