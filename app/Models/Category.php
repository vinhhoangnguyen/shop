<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    //local Scope Search
    public function scopeSearch($query, $value){
        return $query->where('name', 'like', "%{$value}%");
    }
}
