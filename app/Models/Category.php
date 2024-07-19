<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['keyword']) ?? false)
        {
            return $query->where('name', 'Like', '%' . $filter['keyword'] . '%');
        }
    }
}
