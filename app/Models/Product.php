<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "name",
        "is_active"
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }


}

